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


Route::get('sobre-nos', function () {
    return view('pages.sobre-nos');
})->name('sobre-nos');
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
Route::get('refinar-busca', 'App\Http\Controllers\BuscaController@RefinarBusca')->name('refinar-busca');

//======================
// Página da oficina
//======================
Route::get('/oficinas/{id}', 'App\Http\Controllers\OficinaController@view')->name('visualizar-oficina');
Route::post('/agendar', 'App\Http\Controllers\AtendimentoController@agendar')->name('agendar');
Route::post('/atualizar-data', 'App\Http\Controllers\AtendimentoController@atualizar')->name('atualizar-data');

//=======================
// Agendamento realizado
//=======================
Route::get('/agendamento/{id}', 'App\Http\Controllers\AtendimentoController@realizado')->name('agendamento');
Route::get('/cancelar-atendimento/{id}', 'App\Http\Controllers\AtendimentoController@cancelar')->name('cancelar-atendimento');
Route::get('/avaliar-atendimento/{id}', 'App\Http\Controllers\AvaliacaoController@index')->name('cancelar-atendimento');
Route::post('/avaliar-atendimento', 'App\Http\Controllers\AvaliacaoController@avaliar')->name('avaliar');

Route::view('/avaliado', 'pages.avaliacao-feita')->name('avaliado');

//=======================
// Paginas autenticadas
//=======================
Route::middleware(['auth:sanctum', 'verified'])
->get('dashboard', 'App\Http\Controllers\AtendimentoController@lista')
->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('cadastro-oficina', function () {
    return view('cadastro-oficina.cadastro');
})->name('cadastro-oficina');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/oficinas/{id}/agendamento', 'App\Http\Controllers\OficinaController@agendar')
    ->name('agendamento');

//======================
// Cadastros
//======================
Route::get('cadastrar-oficina', 'App\Http\Controllers\OficinaController@verificaCadastro')->name('cadastrar-oficina');
Route::get('editar-oficina/{id}', 'App\Http\Controllers\OficinaController@edit')->name('editar-oficina');
Route::post('cadastro-oficina/salvar', 'App\Http\Controllers\OficinaController@save');
Route::post('cadastro-oficina/atualizar', 'App\Http\Controllers\OficinaController@update');