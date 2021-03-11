<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oficina;
use App\Models\categoria_oficina;
use Illuminate\Http\UploadedFile;

class OficinaController extends Controller
{
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
        $oficina->logo = $request->logo;
        $oficina->codigo_usuario = auth()->user()->id;

        $oficina->save();
        
        /*
         * Grava as categorias da oficina
         */
        if ($request->arrefecimento != NULL):
            $arrefecimento = new categoria_oficina;
            $arrefecimento->codigo_oficina = $oficina->id;
            $arrefecimento->codigo_categoria = 1;
            $arrefecimento->save();
        endif;
        if ($request->motor != NULL):
            $motor = new categoria_oficina;
            $motor->codigo_oficina = $oficina->id;
            $motor->codigo_categoria = 2;
            $motor->save();
        endif;
        if ($request->freios != NULL):
            $freios = new categoria_oficina;
            $freios->codigo_oficina = $oficina->id;
            $freios->codigo_categoria = 3;
            $freios->save();
        endif;
        if ($request->escapamentos != NULL):
            $escapamentos = new categoria_oficina;
            $escapamentos->codigo_oficina = $oficina->id;
            $escapamentos->codigo_categoria = 4;
            $escapamentos->save();
        endif;
        if ($request->revisao != NULL):
            $revisao = new categoria_oficina;
            $revisao->codigo_oficina = $oficina->id;
            $revisao->codigo_categoria = 5;
            $revisao->save();
        endif;
        if ($request->troca_de_bateria != NULL):
            $troca_de_bateria = new categoria_oficina;
            $troca_de_bateria->codigo_oficina = $oficina->id;
            $troca_de_bateria->codigo_categoria = 6;
            $troca_de_bateria->save();
        endif;
        if ($request->correias != NULL):
            $correias = new categoria_oficina;
            $correias->codigo_oficina = $oficina->id;
            $correias->codigo_categoria = 7;
            $correias->save();
        endif;
        if ($request->hidraulica != NULL):
            $hidraulica = new categoria_oficina;
            $hidraulica->codigo_oficina = $oficina->id;
            $hidraulica->codigo_categoria = 8;
            $hidraulica->save();
        endif;
        if ($request->transmissao != NULL):
            $transmissao = new categoria_oficina;
            $transmissao->codigo_oficina = $oficina->id;
            $transmissao->codigo_categoria = 9;
            $transmissao->save();
        endif;
        if ($request->pneus != NULL):
            $pneus = new categoria_oficina;
            $pneus->codigo_oficina = $oficina->id;
            $pneus->codigo_categoria = 10;
            $pneus->save();
        endif;
        if ($request->suspensao != NULL):
            $suspensao = new categoria_oficina;
            $suspensao->codigo_oficina = $oficina->id;
            $suspensao->codigo_categoria = 11;
            $suspensao->save();
        endif;
        if ($request->rodas != NULL):
            $rodas = new categoria_oficina;
            $rodas->codigo_oficina = $oficina->id;
            $rodas->codigo_categoria = 12;
            $rodas->save();
        endif;
        if ($request->radiador != NULL):
            $radiador = new categoria_oficina;
            $radiador->codigo_oficina = $oficina->id;
            $radiador->codigo_categoria = 13;
            $radiador->save();
        endif;
        if ($request->freios_abs != NULL):
            $freios_abs = new categoria_oficina;
            $freios_abs->codigo_oficina = $oficina->id;
            $freios_abs->codigo_categoria = 14;
            $freios_abs->save();
        endif;
        if ($request->ar_condicionado != NULL):
            $ar_condicionado = new categoria_oficina;
            $ar_condicionado->codigo_oficina = $oficina->id;
            $ar_condicionado->codigo_categoria = 15;
            $ar_condicionado->save();
        endif;
        if ($request->injecao != NULL):
            $injecao = new categoria_oficina;
            $injecao->codigo_oficina = $oficina->id;
            $injecao->codigo_categoria = 16;
            $injecao->save();
        endif;
        if ($request->airbag != NULL):
            $airbag = new categoria_oficina;
            $airbag->codigo_oficina = $oficina->id;
            $airbag->codigo_categoria = 17;
            $airbag->save();
        endif;
        if ($request->troca_de_oleo != NULL):
            $troca_de_oleo = new categoria_oficina;
            $troca_de_oleo->codigo_oficina = $oficina->id;
            $troca_de_oleo->codigo_categoria = 18;
            $troca_de_oleo->save();
        endif;
        if ($request->chaveiro != NULL):
            $chaveiro = new categoria_oficina;
            $chaveiro->codigo_oficina = $oficina->id;
            $chaveiro->codigo_categoria = 19;
            $chaveiro->save();
        endif;
        if ($request->alinhamento_e_balanceamento != NULL):
            $alinhamento_e_balanceamento = new categoria_oficina;
            $alinhamento_e_balanceamento->codigo_oficina = $oficina->id;
            $alinhamento_e_balanceamento->codigo_categoria = 20;
            $alinhamento_e_balanceamento->save();
        endif;
        if ($request->direcao != NULL):
            $direcao = new categoria_oficina;
            $direcao->codigo_oficina = $oficina->id;
            $direcao->codigo_categoria = 21;
            $direcao->save();
        endif;

        return redirect(url('/'));
    }
}
