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
        $segunda=Aluno::where('segunda','1')->get();
        $terca=Aluno::where('terca','1')->get();
        $quarta=Aluno::where('quarta','1')->get();
        $quinta=Aluno::where('quinta','1')->get();
        $sexta=Aluno::where('sexta','1')->get();
        $sabado=Aluno::where('sabado','1')->get();
        $domingo=Aluno::where('domingo','1')->get();
        return view('home',compact('alunos','despesas','funcs','planos','segunda','terca','quarta','quinta','sexta','sabado','domingo'));
    }
}
