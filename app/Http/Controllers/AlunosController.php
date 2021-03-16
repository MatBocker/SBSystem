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

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = DB::table('alunos')->get();
        return view('alunos', ['alunos' => $alunos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criarAluno');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno=new Aluno();
        $aluno->nome=$request->nome;
        $aluno->rg=$request->rg;
        $aluno->cpf=$request->cpf;
        $aluno->telefone=$request->telefone;
        $aluno->email=$request->email;
        $aluno->nascimento=$request->data;
        $aluno->sexo=$request->sexo;
        $aluno->estado=$request->estado;
        $aluno->cidade=$request->cidade;
        $aluno->cep=$request->cep;
        $aluno->endereco=$request->endereco;
        $aluno->complemento=$request->complemento;
        $aluno->treino_id=$request->treino;
        $aluno->plano_id=$request->plano;
        $aluno->obs=$request->obs;
        $aluno->save();
        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return view('mostrarAluno',compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        $treinos = Treino::all();
        $planos = Plano::all();
        return view('editarAluno',compact('treinos','planos','aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        $aluno = Aluno::find($aluno->id);
        $aluno->nome=$request->nome;
        $aluno->rg=$request->rg;
        $aluno->cpf=$request->cpf;
        $aluno->telefone=$request->telefone;
        $aluno->email=$request->email;
        $aluno->nascimento=$request->data;
        $aluno->sexo=$request->sexo;
        $aluno->estado=$request->estado;
        $aluno->cidade=$request->cidade;
        $aluno->cep=$request->cep;
        $aluno->endereco=$request->endereco;
        $aluno->complemento=$request->complemento;
        $aluno->treino_id=$request->treino;
        $aluno->plano_id=$request->plano;
        $aluno->obs=$request->obs;
        $aluno->save();
        return redirect()->route('alunos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno=Aluno::find($aluno->id);
        $aluno->delete();
        return redirect()->route('alunos.index');
    }

    public function desativadosA()
    {
        $alunos = DB::table('alunos')->get();
        return view('alunosDesativados', ['alunos' => $alunos]);
    }

    public function restore($id)
    {
        Aluno::withTrashed()->where('id', $id)->restore();
        return redirect()->route('alunos.index');
        
    }

    public function cadastrar()
    {
        $treinos = Treino::all();
        $planos = Plano::all();
        return view('criarAluno', compact('treinos','planos'));
        
    }

    public function ava(Aluno $aluno)
    {
        $avaliacoes = Aluno::find($aluno->id)->avaliacao;
        return view('avaliacoesAluno',compact('avaliacoes','aluno'));
    }
    public function ultimaAva(Aluno $aluno)
    {
        
        $ava = Aluno::find($aluno->id)->avaliacao()->latest()->first();
        if($ava)
        {
            return view('ultimaAvaliacao',compact('ava','aluno'));
        }
        else{
            return redirect()->back()->with('semAvaliacao', 'Este Aluno não possui nenhuma avaliação física');;
        }
        
    }

    public function mostraAva($id)
    {
        $ava = Avaliacao::find($id);
        $aluno = $ava->aluno;
        return view('mostrarAvaliacao',compact('ava','aluno'));
    }

    public function criarAva(Aluno $aluno)
    {
        return view('criarAva',compact('aluno'));
    }

    public function avaliacaoCriar(Request $request ,$id)
    {
        $aluno = Aluno::find($id);
        $ava = new Avaliacao;
        $ava->idade=$request->idade;
        $ava->peso=$request->peso;
        $ava->altura=$request->altura;
        $ava->imc=$request->imc;
        $ava->pesoIdeal=$request->pesoideal;
        $ava->torax=$request->torax;
        $ava->cintura=$request->cintura;
        $ava->abdomem=$request->abdomem;
        $ava->quadril=$request->quadril;
        $ava->coxa=$request->coxa;
        $ava->panturilha=$request->pant;
        $ava->braco=$request->braco;
        $ava->antebraco=$request->antebraco;
        $ava->triceps=$request->triceps;
        $ava->subescapular=$request->subescapular;
        $ava->peitoral=$request->peitoral;
        $ava->axilar=$request->axilar;
        $ava->suprailiaca=$request->suprailiaca;
        $ava->abdominal=$request->abdominal;
        $ava->coxaMM=$request->coxam;
        $ava->somaMM=$request->soma;
        $ava->icq=$request->icq;
        $ava->gordura=$request->gord;
        $ava->gorduraIdeal=$request->gordideal;
        $ava->massaMagra=$request->massa;
        $ava->pesoGordura=$request->pesogord;
        $ava->excessoGordura=$request->exgord;
        $ava->modalidade=$request->modalidade;

        $aluno = $aluno->avaliacao()->save($ava);
        return redirect()->route('alunos.index');
    }
}
