<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuscaController extends Controller
{
    public function index()
    {
        return view('pages.busca', [
            'title' => 'Busca'
        ]);
    }

    public function detail()
    {
        $banners = [
            (object) [
                "image"=>'banner1.jpg',
                "image_mobile"=>'imagem1',
                "subtitle"=>'imagem1'
            ],
            (object) [
                "image"=>'banner2.jpg',
                "image_mobile"=>'imagem2',
                "subtitle"=>'imagem2'
            ]
        ];

        return view('pages.detalhe', [
            'title' => 'Detalhe de especialista',
            'banners' => $banners
        ]);
    }
    
}
