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
        
        $oficinas_filtro = [];
        $categorias_oficina = [];
        $cidade_sels = [];
        $estados_sels = [];
        $categorias_sels = [];
        $oficinas = [];

        $todas_categorias = categoria::all();
        $todos_estados =  DB::table('oficinas')->select('uf')->orderBy('uf')->distinct()->get();
        $todas_cidades =  DB::table('oficinas')->select('cidade')->orderBy('cidade')->distinct()->get();

        // Busca as oficinas
        $categorias = $request->categorias;
        $estados = $request->estados;
        $cidades = $request->cidades;

        // Verifica as categorias
        if ($categorias <> NULL):
            
            $categorias_sels = $request->categorias;
            
            // cidades e estados preenchidos
            if ($cidades <> NULL AND $estados <> NULL) :
                $oficinas = DB::table('categoria_oficinas')
                ->join('oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->select('codigo_oficina')
                ->whereIn('categoria_oficinas.codigo_categoria', $categorias)
                ->whereIn('oficinas.uf', $estados)
                ->whereIn('oficinas.cidade', $cidades)
                ->groupBy('codigo_oficina')
                ->get();
                
                $cidade_sels = $request->cidades;
                $estados_sels = $request->estados;
            // Apenas estados preenchidos
            elseif ($cidades == NULL AND $estados <> NULL) :
                $oficinas = DB::table('categoria_oficinas')
                ->join('oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->select('codigo_oficina')
                ->whereIn('categoria_oficinas.codigo_categoria', $categorias)
                ->whereIn('oficinas.uf', $estados)
                ->groupBy('codigo_oficina')
                ->get();
                
                $estados_sels = $request->estados;
            // Apenas cidades preenchidas
            elseif ($cidades <> NULL AND $estados == NULL) :
                $oficinas = DB::table('categoria_oficinas')
                ->join('oficinas', 'categoria_oficinas.codigo_oficina', '=', 'oficinas.id')
                ->select('codigo_oficina')
                ->whereIn('categoria_oficinas.codigo_categoria', $categorias)
                ->whereIn('oficinas.cidade', $cidades)
                ->groupBy('codigo_oficina')
                ->get();

                $cidade_sels = $request->cidades;
            // Apenas categorias
            else :
                $oficinas = DB::table('categoria_oficinas')
                ->select('codigo_oficina')
                ->whereIn('categoria_oficinas.codigo_categoria', $categorias)
                ->get();
            endif;

            $oficinas_ids = [];
            foreach ($oficinas as $oficina) :
                array_push($oficinas_ids, $oficina->codigo_oficina);
            endforeach;

            $oficinas_filtro = DB::table('oficinas')
            ->whereIn('id', $oficinas_ids)
            ->get();
        else :
            if ($cidades <> NULL):
                $cidade_sels = $cidades;
            endif;
            if ($estados <> NULL):
                $estados_sels = $estados;
            endif;
            
            return view('pages.retorno-busca')
            ->with('oficinas', $oficinas_filtro)
            ->with('categorias', $categorias_oficina)
            ->with('estados', $todos_estados)
            ->with('cidades', $todas_cidades)
            ->with('cidades_sels', $cidade_sels)
            ->with('estados_sels', $estados_sels)
            ->with('cat_sels', $categorias_sels)
            ->with('todas_categorias', $todas_categorias)
            ->with('cryptKey', $cryptKey);
        endif;
        
        // Busca as categorias das oficinas
        $categorias_oficina = [];
        foreach ($oficinas_filtro as $oficina_filtro):
            $categorias = DB::table('categorias')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_categoria' , '=', 'categorias.id') 
            ->select('categorias.descricao', 'categoria_oficinas.codigo_oficina')
            ->where('categoria_oficinas.codigo_oficina', $oficina_filtro->id)
            ->take(5)
            ->get();

            foreach ($categorias as $categoria):
                array_push($categorias_oficina, $categoria);
            endforeach;
        endforeach;

        return view('pages.retorno-busca')
            ->with('oficinas', $oficinas_filtro)
            ->with('categorias', $categorias_oficina)
            ->with('estados', $todos_estados)
            ->with('cidades', $todas_cidades)
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

    public function BuscaUrl(Request $request)
    {
        $cryptKey = '99123456789';
        $cidades_sels = [];
        $estados_sels = [];
        $cat_sels = [];
        array_push($cat_sels, $request->categoria);
        $todas_categorias = categoria::all();
        $estados =  DB::table('oficinas')->select('uf')->orderBy('uf')->distinct()->get();
        $cidades =  DB::table('oficinas')->select('cidade')->orderBy('cidade')->distinct()->get();
        
        
        $oficinas = DB::table('categoria_oficinas')
        ->select('codigo_oficina')
        ->whereIn('categoria_oficinas.codigo_categoria', $cat_sels)
        ->get();
        
        $oficinas_ids = [];
        foreach ($oficinas as $oficina) :
            array_push($oficinas_ids, $oficina->codigo_oficina);
        endforeach;

        $oficinas_filtro = DB::table('oficinas')
        ->whereIn('id', $oficinas_ids)
        ->get();

        // Busca as categorias das oficinas
        $categorias_oficina = [];
        foreach ($oficinas_filtro as $oficina_filtro):
            $categorias = DB::table('categorias')
            ->join('categoria_oficinas', 'categoria_oficinas.codigo_categoria' , '=', 'categorias.id') 
            ->select('categorias.descricao', 'categoria_oficinas.codigo_oficina')
            ->where('categoria_oficinas.codigo_oficina', $oficina_filtro->id)
            ->take(5)
            ->get();

            foreach ($categorias as $categoria):
                array_push($categorias_oficina, $categoria);
            endforeach;
        endforeach;

        return view('pages.retorno-busca')
            ->with('oficinas', $oficinas_filtro)
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
