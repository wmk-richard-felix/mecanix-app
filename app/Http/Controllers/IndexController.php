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
        $cryptKey = '99123456789';
        $categorias = DB::table('categorias')->select('id','descricao')->orderBy('descricao')->get();
        $estados =  DB::table('oficinas')->select('uf')->orderBy('uf')->distinct()->get();
        $cidades =  DB::table('oficinas')->select('cidade')->orderBy('cidade')->distinct()->get();
        $oficinas = DB::table('oficinas')->select()->orderBy('id', 'desc')->take(4)->get();

        return view('pages.index')
            ->with('categorias', $categorias)
            ->with('estados', $estados)
            ->with('cidades', $cidades)
            ->with('cryptKey', $cryptKey)
            ->with('oficinas', $oficinas);
    }

    public function RealizaBusca(Request $request)
    {
        $cryptKey = '99123456789';
        $todas_categorias = categoria::all();
        $estados =  DB::table('oficinas')->select('uf')->orderBy('uf')->distinct()->get();
        $cidades =  DB::table('oficinas')->select('cidade')->orderBy('cidade')->distinct()->get();

        // Busca as oficinas
        $oficinas = [];
        $categoria = $request->categoria;
        $uf = $request->uf;
        $cidade = $request->cidade;

        $cidades_sels = [$cidade];
        $estados_sels = [$uf];
        $cat_sels = [$categoria];
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

        // Busca as categorias das oficinas
        $categorias_oficina = [];
        foreach ($oficinas as $oficina):
            $categorias = DB::table('categorias')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_categoria' , '=', 'categorias.id') 
            ->select('categorias.descricao', 'categoria_oficinas.codigo_oficina')
            ->where('categoria_oficinas.codigo_oficina', $oficina->id)
            ->take(5)
            ->get();
            foreach ($categorias as $categoria):
                array_push($categorias_oficina, $categoria);
            endforeach;
        endforeach;

        return view('pages.retorno-busca')
            ->with('oficinas', $oficinas)
            ->with('categorias', $categorias_oficina)
            ->with('estados', $estados)
            ->with('cidades', $cidades)
            ->with('cidades_sels', $cidades_sels)
            ->with('estados_sels', $estados_sels)
            ->with('cat_sels', $cat_sels)
            ->with('todas_categorias', $todas_categorias)
            ->with('cryptKey', $cryptKey);
    }
}
