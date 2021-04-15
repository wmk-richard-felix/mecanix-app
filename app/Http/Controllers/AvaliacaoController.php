<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\atendimento;
use App\Models\categoria;
use App\Models\avaliacao;
use App\Models\User;
use App\Models\oficina;
use Illuminate\Support\Facades\DB;

class AvaliacaoController extends Controller
{
    public function index($id)
    {
        $id_atendimento = $id / 99123456789;
        $atendimento = atendimento::find($id_atendimento);
        $oficina = oficina::find($atendimento->codigo_oficina);
        $categoria = categoria::find($atendimento->categoria_atendimento);

        $data_criacao = substr($atendimento->created_at, 8, 2).'/'.substr($atendimento->created_at, 5, 2).'/'.substr($atendimento->created_at, 0, 4).' - '.substr($atendimento->created_at, 11, 8);
        $data_realizado = substr($atendimento->data_realizada, 8, 2).'/'.substr($atendimento->data_realizada, 5, 2).'/'.substr($atendimento->data_realizada, 0, 4).' - '.substr($atendimento->data_realizada, 11, 8);
        
        return view('pages.avaliacao')
        ->with('realizado_em', $data_realizado)
        ->with('criado_em', $data_criacao)
        ->with('oficina', $oficina)
        ->with('id', $id)
        ->with('categoria', $categoria->descricao);

    }

    public function avaliar(Request $request)
    {
        $atendimento = atendimento::find($request->id / 99123456789);
        $avaliacao = new avaliacao();
        $avaliacao->codigo_oficina = $atendimento->codigo_oficina;
        $avaliacao->codigo_usuario = $atendimento->codigo_usuario;
        $avaliacao->codigo_atendimento = $atendimento->id;
        $avaliacao->estrelas = $request->rating;
        $avaliacao->comentario = $request->comentario;
        $avaliacao->save();

        return redirect('avaliado');



    }
}
