<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('alunos','AlunosController');
Route::resource('treinos','TreinosController');
Route::get('desativadosA', 'AlunosController@desativadosA')->name('alunos.desativadosA');
Route::patch('alunos/restore/{id}', 'AlunosController@restore')->name('alunos.restore');
Route::get('cadastrar', 'AlunosController@cadastrar')->name('alunos.cadastrar');
Route::get('desativados', 'PlanosController@desativados')->name('planos.desativados');
Route::patch('planos/restore/{id}', 'PlanosController@restore')->name('planos.restore');
Route::get('alunos/{aluno}/ava', 'AlunosController@ava')->name('alunos.ava');
Route::get('alunos/{aluno}/ultimaAva', 'AlunosController@ultimaAva')->name('alunos.ultimaAva');
Route::get('alunos/{aluno}/mostraAva', 'AlunosController@mostraAva')->name('alunos.mostraAva');
Route::get('alunos/{aluno}/criarAva', 'AlunosController@criarAva')->name('alunos.criarAva');
Route::put('alunos/avaliacaoCriar/{id}', 'AlunosController@avaliacaoCriar')->name('alunos.avaliacaoCriar');
});

Route::middleware(['auth','dono'])->group(function() {
    Route::resource('planos','PlanosController');

});