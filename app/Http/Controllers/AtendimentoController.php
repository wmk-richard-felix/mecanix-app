<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\atendimento;
use App\Models\categoria;
use App\Models\oficina;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
{
    /*
     * Codigos de status
     * 1 - Aguardando retorno da oficina
     * 2 - Aguardando aceite do cliente
     * 3 - Agendamento realizado
     * 4 - Agendamento cancelado
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
                $descricao = "Agendamento cancelado";
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

        return redirect('agendamento-realizado/'. $atendimento->id * 99123456789);
    }

    public function realizado($id)
    {
        $id_atendimento = $id / 99123456789;
        $atendimento = atendimento::find($id_atendimento);
        $status = $this->RetornaStatus($atendimento->status);

        $oficina = oficina::find($atendimento->codigo_oficina);
        $categoria = categoria::find($atendimento->categoria_atendimento);

        $data_sugerida = substr($atendimento->data_sugerida, 8, 2).'/'.substr($atendimento->data_sugerida, 5, 2).'/'.substr($atendimento->data_sugerida, 0, 4).' - '.substr($atendimento->data_sugerida, 11, 8);

        return view('pages.agendamento-realizado')
        ->with('oficina', $oficina)
        ->with('categoria', $categoria->descricao)
        ->with('relato', $atendimento->relato)
        ->with('data_sugerida', $data_sugerida)
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
}
