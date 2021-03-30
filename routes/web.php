<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('diagnostico', function () {
    return view('pages.diagnostico');
})->name('diagnostico');

//======================
// Home Page
//======================
Route::get('/', 'App\Http\Controllers\IndexController@Index')->name('home');
Route::post('/retorno-busca', 'App\Http\Controllers\IndexController@RealizaBusca')->name('busca-home');
Route::post('/retorno-busca-filtro', 'App\Http\Controllers\BuscaController@RealizaFiltro')->name('filtro-busca');

//======================
// Busca
//======================
Route::get('/busca-assistente', 'App\Http\Controllers\IndexController@BuscaUrl')->name('busca-assistente');


//=======================
// Paginas autenticadas
//=======================
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('cadastro-oficina', function () {
    return view('cadastro-oficina.cadastro');
})->name('cadastro-oficina');


//======================
// Cadastros
//======================
Route::get('cadastrar-oficina', 'App\Http\Controllers\OficinaController@verificaCadastro')->name('cadastrar-oficina');
Route::get('editar-oficina/{id}', 'App\Http\Controllers\OficinaController@edit')->name('editar-oficina');
Route::post('cadastro-oficina/salvar', 'App\Http\Controllers\OficinaController@save');
Route::post('cadastro-oficina/atualizar', 'App\Http\Controllers\OficinaController@update');