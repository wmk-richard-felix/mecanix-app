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

Route::get('/', function () {
    return view('pages.index');
})->name('inicio');

Route::get('diagnostico', function () {
    return view('pages.diagnostico');
})->name('diagnostico');

//=======================
// Paginas autenticadas
//=======================
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('cadastrar-oficina', function () {
    return view('pages.cadastrar-oficina');
})->name('cadastrar-oficina');


//======================
// Cadastros
//======================
Route::post('cadastrar-oficina/salvar', 'App\Http\Controllers\OficinaController@save');