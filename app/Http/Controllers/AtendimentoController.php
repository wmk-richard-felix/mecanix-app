<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\atendimento;
use App\Models\categoria;
use App\Models\User;
use App\Models\oficina;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
{
    /*
     * Codigos de status
     * 1 - Aguardando retorno da oficina
     * 2 - Aguardando aceite do cliente
     * 3 - Agendamento realizado
     * 4 - Atendimento cancelado
     * 5 - Atendimento realizado
     */

    public function RetornaStatus($codigo)
    {
        switch ($codigo) {
            case 1:
                $descricao = "Aguardando retorno da oficina";
                break;
            case 2:
                $descricao = "Aguardando aceite do cliente";
                break;
            case 3:
                $descricao = "Agendamento realizado";
                break;
            case 4:
                $descricao = "Atendimento cancelado";
                break;
            case 5:
                $descricao = "Atendimento realizado";
                break;
        }
        return $descricao;
    }

    /*
     * Realiza o agendamento do atendimento
     */
    public function agendar(Request $request)
    {
        $atendimento = new atendimento();
        $atendimento->codigo_usuario = auth()->user()->id;
        $atendimento->codigo_oficina = $request->id_oficina / 99123456789;
        $atendimento->data_sugerida = $request->data_sugerida;
        $atendimento->categoria_atendimento = $request->categoria;
        $atendimento->status = 1;
        $atendimento->relato = $request->relato;
        $atendimento->data_confirmada = '1000-01-01 00:00:00';
        $atendimento->data_realizada = '1000-01-01 00:00:00';
        $atendimento->diagnostico_oficina = '';
        $atendimento->diagnostico_mecanix = '';
        $atendimento->valor_orcamento = 0;
        $atendimento->save();

        return redirect('agendamento/'. $atendimento->id * 99123456789);
    }

    public function realizado($id)
    {
        $id_atendimento = $id / 99123456789;
        $atendimento = atendimento::find($id_atendimento);
        $status = $this->RetornaStatus($atendimento->status);

        $oficina = oficina::find($atendimento->codigo_oficina);
        $categoria = categoria::find($atendimento->categoria_atendimento);
        $user = User::find($atendimento->codigo_usuario);

        $data_sugerida = substr($atendimento->data_sugerida, 8, 2).'/'.substr($atendimento->data_sugerida, 5, 2).'/'.substr($atendimento->data_sugerida, 0, 4).' - '.substr($atendimento->data_sugerida, 11, 8);
        $data_criacao = substr($atendimento->created_at, 8, 2).'/'.substr($atendimento->created_at, 5, 2).'/'.substr($atendimento->created_at, 0, 4).' - '.substr($atendimento->created_at, 11, 8);
        $data_realizado = substr($atendimento->data_realizada, 8, 2).'/'.substr($atendimento->data_realizada, 5, 2).'/'.substr($atendimento->data_realizada, 0, 4).' - '.substr($atendimento->data_realizada, 11, 8);

        $avaliacao = DB::table('avaliacoes')
        ->where('codigo_atendimento', $id_atendimento)
        ->get();

        $avaliado = false;
        if (count($avaliacao)):
            $avaliado = true;
        endif;
        
        return view('pages.agendamento-realizado')
        ->with('oficina', $oficina)
        ->with('categoria', $categoria->descricao)
        ->with('relato', $atendimento->relato)
        ->with('data_sugerida', $data_sugerida)
        ->with('data_sugerida_orig', str_replace(' ','T', $atendimento->data_sugerida))
        ->with('data_realizado', $data_realizado)
        ->with('statusCod', $atendimento->status)
        ->with('oficinaEditando', auth()->user()->id == $oficina->codigo_usuario)
        ->with('usuarioEditando', auth()->user()->id == $atendimento->codigo_usuario)
        ->with('usuario', $user)
        ->with('id', $atendimento->id)
        ->with('idToken', $id)
        ->with('criado_em', $data_criacao)
        ->with('avaliado', $avaliado)
        ->with('avaliacao', $avaliacao)
        ->with('status', $status);

    }

    public function lista()
    {
        $atendimentos = [];
        $atendimentosOficina = [];

        if (auth()->user()->id <> NULL):
            // Busca atendimentos para o usuário
            $atendimentos = DB::table('atendimentos')
            ->join('oficinas', 'oficinas.id' , '=', 'atendimentos.codigo_oficina') 
            ->select('atendimentos.*', 'oficinas.nome_fantasia', 'oficinas.cidade', 'oficinas.uf', 'oficinas.logo')
            ->where('atendimentos.codigo_usuario', auth()->user()->id)
            ->get();
            
            // Busca atendimentos para a oficina
            $atendimentosOficina = DB::table('atendimentos')
            ->join('oficinas', 'oficinas.id' , '=', 'atendimentos.codigo_oficina') 
            ->select('atendimentos.*', 'oficinas.nome_fantasia', 'oficinas.cidade', 'oficinas.uf', 'oficinas.logo')
            ->where('oficinas.codigo_usuario', auth()->user()->id)
            ->get();
        endif;
        

        return view('dashboard')
        ->with('atendimentos', $atendimentos)
        ->with('atendimentosOficina', $atendimentosOficina)
        ->with('cryptKey', 99123456789);

    }

    public function atualizar(Request $request)
    {
        $atendimento = atendimento::find($request->atendimento);
        
        if ($request->novo_status == "5"):
            $atendimento->data_realizada = $request->data_sugerida;
            $atendimento->status = $request->novo_status;
        else:
            $atendimento->data_sugerida = $request->data_sugerida;
            if ($atendimento->data_sugerida <> $request->data_sugerida):
                $atendimento->status = $request->novo_status;
            else:
                $atendimento->status = "3";
            endif;
        endif;
        $atendimento->save();

        return redirect('agendamento/'. $atendimento->id * 99123456789); 
    }

    public function cancelar($id)
    {
        $id_atendimento = $id / 99123456789;
        $atendimento = atendimento::find($id_atendimento);
        $atendimento->status = "4";
        $atendimento->save();
        return redirect('agendamento/'.$id);
    }
}
