<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Plano;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alunos = DB::table('alunos')->whereNull('deleted_at')->get();
        $despesas = DB::table('despesas')->whereNull('deleted_at')->get();
        $funcs = DB::table('funcionarios')->whereNull('deleted_at')->get();
        $planos=Aluno::distinct()->count('plano_id');
        return view('home',compact('alunos','despesas','funcs','planos'));
    }
}
