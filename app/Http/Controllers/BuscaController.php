<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oficina;
use App\Models\categoria;
use Illuminate\Support\Facades\DB;

class BuscaController extends Controller
{
    public function RealizaFiltro(Request $request)
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

        if ($request->estados <> NULL and $request->cidades <> NULL and $request->categorias <> NULL):
            $oficinas = DB::table('oficinas')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
            ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
            ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
            ->whereIn('oficinas.uf', $request->estados)
            ->whereIn('oficinas.cidade', $request->cidades)
            ->whereIn('categorias.id', $request->categorias)
            ->get();
        
            $cidade_sels = $request->cidades;
            $estados_sels = $request->estados;
            $categorias_sels = $request->categorias;

        elseif($request->estados == NULL):
            if ($request->cidades <> NULL):
                $oficinas = DB::table('oficinas')
                ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
                ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
                ->whereIn('categorias.id', $request->categorias)
                ->whereIn('oficinas.cidade', $request->cidades)
                ->get();

                $cidade_sels = $request->cidades;
                $estados_sels = [];
                $categorias_sels = $request->categorias;
            else:
                $oficinas = DB::table('oficinas')
                ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
                ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
                ->whereIn('categorias.id', $request->categorias)
                ->get();

                $cidade_sels = [];
                $estados_sels = [];
                $categorias_sels = $request->categorias;
            endif;
        elseif($request->cidades == NULL):
            if ($request->categorias <> NULL):
                $oficinas = DB::table('oficinas')
                ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
                ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
                ->whereIn('categorias.id', $request->categorias)
                ->whereIn('oficinas.uf', $request->estados)
                ->get();

                $cidade_sels = [];
                $estados_sels = $request->estados;
                $categorias_sels = $request->categorias;
            else:
                $oficinas = DB::table('oficinas')
                ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
                ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
                ->whereIn('oficinas.uf', $request->estados)
                ->get();

                $cidade_sels = [];
                $estados_sels = $request->estados;
                $categorias_sels = [];
            endif;
        else:
            $oficinas = DB::table('oficinas')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
            ->join('categorias', 'categorias.id' , '=', 'categoria_oficinas.codigo_categoria') 
            ->select('oficinas.*', 'categorias.descricao as descricao_categoria')
            ->whereIn('oficinas.cidade', $request->cidades)
            ->get();

            $cidade_sels = $request->cidades;
            $estados_sels = [];
            $categorias_sels = [];
        endif;
        
        // Busca as categorias das oficinas
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

        return view('pages.retorno-busca')
            ->with('oficinas', $oficinas)
            ->with('categorias', $categorias_oficina)
            ->with('estados', $estados)
            ->with('cidades', $cidades)
            ->with('cidades_sels', $cidade_sels)
            ->with('estados_sels', $estados_sels)
            ->with('cat_sels', $categorias_sels)
            ->with('todas_categorias', $todas_categorias)
            ->with('cryptKey', $cryptKey);
    }

    public function RefinarBusca()
    {
        $todas_categorias = categoria::all();
        $estados =  DB::table('oficinas')->select('uf')->orderBy('uf')->distinct()->get();
        $cidades =  DB::table('oficinas')->select('cidade')->orderBy('cidade')->distinct()->get();

        return view('pages.filtro-busca')
            ->with('estados', $estados)
            ->with('cidades', $cidades)
            ->with('todas_categorias', $todas_categorias);
    }
}
