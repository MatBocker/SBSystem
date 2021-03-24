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
Route::get('alunos/{aluno}/ava', 'AlunosController@ava')->name('alunos.ava');
Route::get('alunos/{aluno}/ultimaAva', 'AlunosController@ultimaAva')->name('alunos.ultimaAva');
Route::get('alunos/{aluno}/mostraAva', 'AlunosController@mostraAva')->name('alunos.mostraAva');
Route::get('alunos/{aluno}/criarAva', 'AlunosController@criarAva')->name('alunos.criarAva');
Route::put('alunos/avaliacaoCriar/{id}', 'AlunosController@avaliacaoCriar')->name('alunos.avaliacaoCriar');
Route::get('procurar', 'AlunosController@procurar')->name('alunos.procurar');
Route::get('procurarT', 'TreinosController@procurarT')->name('treinos.procurarT');
Route::get('procurarDesativados', 'AlunosController@procurarDesativados')->name('alunos.procurarDesativados');
Route::get('alunos/excluirPermanente/{id}', 'AlunosController@excluirPermanente')->name('alunos.excluirPermanente');
Route::get('alunos/{aluno}/pdfTeste', 'AlunosController@pdfTeste')->name('alunos.pdfTeste');
Route::get('alunos/{aluno}/pdfAva', 'AlunosController@pdfAva')->name('alunos.pdfAva');
Route::get('alunos/{aluno}/pdfAvaliaca', 'AlunosController@pdfAvaliaca')->name('alunos.pdfAvaliaca');
});

Route::middleware(['auth','dono'])->group(function() {
Route::resource('planos','PlanosController');
Route::resource('funcionarios','FuncionariosController');
Route::get('desativados', 'PlanosController@desativados')->name('planos.desativados');
Route::patch('planos/restore/{id}', 'PlanosController@restore')->name('planos.restore');
Route::patch('funcionarios/restore/{id}', 'FuncionariosController@restore')->name('funcionarios.restore');
Route::get('desativadosF', 'FuncionariosController@desativadosF')->name('funcionarios.desativadosF');
Route::get('procurarF', 'FuncionariosController@procurarF')->name('funcionarios.procurarF');
Route::get('procurarP', 'PlanosController@procurarP')->name('planos.procurarP');
Route::get('procurarDP', 'PlanosController@procurarDP')->name('planos.procurarDP');
Route::get('procurarDF', 'FuncionariosController@procurarDF')->name('funcionarios.procurarDF');
Route::get('planos/excluirPermanente/{id}', 'PlanosController@excluirPermanente')->name('planos.excluirPermanente');
Route::get('funcionarios/excluirPermanente/{id}', 'FuncionariosController@excluirPermanente')->name('funcionarios.excluirPermanente');
Route::resource('despesas','DespesasController');
Route::get('pagas', 'DespesasController@pagas')->name('despesas.pagas');
Route::get('despesas/excluir/{id}', 'DespesasController@excluir')->name('despesas.excluir');
Route::get('despesas/excluirPaga/{id}', 'DespesasController@excluirPaga')->name('despesas.excluirPaga');
Route::get('procurarD', 'DespesasController@procurarD')->name('despesas.procurarD');
Route::get('procurarDD', 'DespesasController@procurarDD')->name('despesas.procurarDD');
});