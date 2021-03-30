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
        /*
         * SELECT oficinas.*, categorias.id FROM oficinas
         * INNER JOIN categoria_oficinas ON categoria_oficinas.codigo_oficina = oficinas.id
         * INNER JOIN categorias ON categorias.id = categoria_oficinas.codigo_categoria
         * WHERE oficinas.uf = $uf
         * AND oficinas.cidade = $cidade
         * AND categorias.id = $id
         */
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

        $categorias_oficina = [];
        foreach ($oficinas as $oficina):
            /*
             * SELECT categorias.descricao, categoria_oficinas.codigo_oficina 
             * FROM categorias 
             * INNER JOIN categoria_oficinas ON categoria_oficinas.codigo_categoria = categorias.id 
             * WHERE categoria_oficinas.codigo_oficina = $id
             */
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

        return view('pages.retorno-busca')->with('oficinas', $oficinas)->with('categorias', $categorias_oficina);
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
