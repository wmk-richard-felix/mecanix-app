<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\BuscaController;
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

Route::get('/', function () {
    return view('pages.index');
})->name('inicio');

Route::get('diagnostico', function () {
    return view('pages.diagnostico');
})->name('diagnostico');

Route::get('buscar/especialista', [BuscaController::class, 'index'])->name('busca');
Route::get('especialista/{categoria}/{especialista}', [BuscaController::class, 'detail'])->name('busca-detalhe');

Route::get('cadastrar-oficina', 'App\Http\Controllers\OficinaController@verificaCadastro')->name('cadastrar-oficina');
Route::get('editar-oficina/{id}', 'App\Http\Controllers\OficinaController@edit')->name('editar-oficina');

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
Route::post('cadastro-oficina/salvar', 'App\Http\Controllers\OficinaController@save');
Route::post('cadastro-oficina/atualizar', 'App\Http\Controllers\OficinaController@update');