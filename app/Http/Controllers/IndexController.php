<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oficina;
use App\Models\categoria;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function Index()
    {
        $categorias = DB::table('categorias')->select('id','descricao')->orderBy('descricao')->get();
        $estados =  DB::table('oficinas')->select('uf')->orderBy('uf')->distinct()->get();
        $cidades =  DB::table('oficinas')->select('cidade')->orderBy('cidade')->distinct()->get();
        $oficinas = DB::table('oficinas')->select()->orderBy('id', 'desc')->take(4)->get();

        return view('pages.index')
            ->with('categorias', $categorias)
            ->with('estados', $estados)
            ->with('cidades', $cidades)
            ->with('oficinas', $oficinas);
    }

    public function RealizaBusca(Request $request)
    {
        $oficinas = [];
        $categoria = $request->categoria;
        $uf = $request->uf;
        $cidade = $request->cidade;

        if ($cidade != ""):
            // Todos os campos preenchidos
            $oficinas = DB::table('oficinas')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
            ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
            ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
            ->where('oficinas.uf', $uf)
            ->where('oficinas.cidade', $cidade)
            ->where('categorias.id', $categoria)
            ->get();
        else:
            // Campo cidade em branco
            $oficinas = DB::table('oficinas')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
            ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
            ->select('oficinas.*', 'categorias.descricao')
            ->where('oficinas.uf', $uf)
            ->where('categorias.id', $categoria)
            ->get();
        endif;

        return view('pages.retorno-busca')->with('oficinas', $oficinas);
    }

    public function BuscaUrl(Request $request)
    {
        $oficinas = DB::table('oficinas')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
            ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
            ->select('oficinas.*', 'categorias.descricao')
            ->where('categorias.id', $request->categoria)
            ->get();

        return view('pages.retorno-busca')->with('oficinas', $oficinas);
    }
}
