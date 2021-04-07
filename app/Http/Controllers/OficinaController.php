<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oficina;
use App\Models\categoria;
use App\Models\categoria_oficina;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class OficinaController extends Controller
{
    /*
     * Verifica se o usuário logado já tem oficinas cadastradas
     */
    public function verificaCadastro(Request $request)
    {
        if (auth()->user() == NULL) :
            return view('pages.cadastrar-oficina');
        endif;
        
        $oficinas = oficina::where('codigo_usuario', auth()->user()->id)->get();
        if (count($oficinas)) :
            // Retorna lista de oficinas do usuário
            return view('cadastro-oficina.lista')->with('oficinas', $oficinas);
        endif;

        return view('pages.cadastrar-oficina');
    }

    /*
     * Salva a oficina e suas categorias
     */
    public function save(Request $request)
    {
        /*
         * Grava o nome da foto e move para o server
         */
        if ($request->logo != NULL):
            $nome_imagem = md5(uniqid(time())) . "." . $request->logo->extension();
            $caminho_imagem = "img/logotipos/" . $nome_imagem;
            move_uploaded_file($request->logo->path(), $caminho_imagem);
        else:
            $nome_imagem = '';
        endif;

        /*
         * Grava a tabela de oficinas
         */
        $oficina = new oficina;
        $oficina->cnpj = $request->cnpj;
        $oficina->razao_social = $request->razao_social;
        $oficina->nome_fantasia = $request->nome_fantasia;
        $oficina->cep = $request->cep;
        $oficina->endereco = $request->endereco;
        $oficina->numero = $request->numero;
        if ($request->complemento==NULL) :
            $oficina->complemento = '';
        else :
            $oficina->complemento = $request->complemento;
        endif;
        $oficina->bairro = $request->bairro;
        $oficina->cidade = $request->cidade;
        $oficina->uf = $request->uf;
        $oficina->telefone = $request->telefone;
        $oficina->email_contato = $request->email_contato;
        $oficina->logo = $nome_imagem;
        $oficina->info = $request->info;
        $oficina->codigo_usuario = auth()->user()->id;

        $oficina->save();
        
        // Adiciona as categorias
        foreach($request->categorias as $categoria):
            $categoriaOficina = new categoria_oficina;
            $categoriaOficina->codigo_oficina = $oficina->id;
            $categoriaOficina->codigo_categoria = $categoria;
            $categoriaOficina->save();
        endforeach;

        return redirect(url('/cadastrar-oficina?saved=ok'));
    }

    /*
     * Edita a oficina e suas categorias
     */
    public function edit($id)
    {
        $oficina = oficina::find($id);
        $categorias = categoria_oficina::where('codigo_oficina', $id)->get();
        $categoriasMarcadas = [];

        foreach($categorias as $categoria):
            array_push($categoriasMarcadas, $categoria->codigo_categoria);
        endforeach;

        return view('cadastro-oficina.editar')->with('oficina', $oficina)->with('categorias', $categoriasMarcadas);
    }

    /*
     * Atualiza o cadastro da oficina
     */
    public function update(Request $request)
    {
        /*
         * Grava o nome da foto e move para o server
         */
        if ($request->logo != NULL):
            $nome_imagem = md5(uniqid(time())) . "." . $request->logo->extension();
            $caminho_imagem = "img/logotipos/" . $nome_imagem;
            move_uploaded_file($request->logo->path(), $caminho_imagem);
        else:
            $nome_imagem = '';
        endif;

        $oficina = oficina::find($request->token_id);
        $oficina->cnpj = $request->cnpj;
        $oficina->razao_social = $request->razao_social;
        $oficina->nome_fantasia = $request->nome_fantasia;
        $oficina->cep = $request->cep;
        $oficina->endereco = $request->endereco;
        $oficina->numero = $request->numero;
        $oficina->info = $request->info;
        
        if ($request->complemento==NULL) :
            $oficina->complemento = '';
        else :
            $oficina->complemento = $request->complemento;
        endif;
        
        $oficina->bairro = $request->bairro;
        $oficina->cidade = $request->cidade;
        $oficina->uf = $request->uf;
        $oficina->telefone = $request->telefone;
        $oficina->email_contato = $request->email_contato;
        
        if ($nome_imagem != "") :
            $oficina->logo = $nome_imagem;
        endif;

        $oficina->save();
        
        // Verifica se a oficina já contém a categoria cadastrada
        $categorias_da_oficina = [];
        $categorias = categoria_oficina::where('codigo_oficina', $request->token_id)->get();
        
        foreach($categorias as $categoria):
            array_push($categorias_da_oficina, $categoria->codigo_categoria);
        
            // Exclui as categorias desmarcadas
            if (!in_array($categoria->codigo_categoria, $request->categorias)):
                $categoria_a_deletar = categoria_oficina::find($categoria->id);
                $categoria_a_deletar->delete();
            endif;
        endforeach;

        // Adiciona as categorias
        foreach($request->categorias as $categoria):
            if (!in_array($categoria, $categorias_da_oficina)):
                $categoriaOficina = new categoria_oficina;
                $categoriaOficina->codigo_oficina = $request->token_id;
                $categoriaOficina->codigo_categoria = $categoria;
                $categoriaOficina->save();
            endif;
        endforeach;
        
        return redirect(url('/cadastrar-oficina?saved=ok'));
    }

    public function view($idPar)
    {
        $id = $idPar / 99123456789;
        $oficina = oficina::find($id);

        $categorias = DB::table('categorias')
        ->join('categoria_oficinas', 'categoria_oficinas.codigo_categoria' , '=', 'categorias.id') 
        ->select('categorias.descricao', 'categoria_oficinas.codigo_oficina')
        ->where('categoria_oficinas.codigo_oficina', $oficina->id)
        ->get();

        return view('pages.oficina')
        ->with('oficina', $oficina)
        ->with('categorias', $categorias)
        ->with('id', $idPar);
    }

    // Agendamento do serviço
    public function agendar($idPar)
    {
        $id = $idPar / 99123456789;
        $oficina = oficina::find($id);

        $categorias = DB::table('categorias')
        ->join('categoria_oficinas', 'categoria_oficinas.codigo_categoria' , '=', 'categorias.id') 
        ->select('categorias.descricao', 'categoria_oficinas.codigo_oficina')
        ->where('categoria_oficinas.codigo_oficina', $oficina->id)
        ->get();

        return view('pages.agendamento')
        ->with('oficina', $oficina)
        ->with('categorias', $categorias)
        ->with('id', $idPar);
    }
}
