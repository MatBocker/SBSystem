<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = DB::table('funcionarios')->get();
        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('criarFuncionario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario=new Funcionario();
        $funcionario->nome=$request->nome;
        $funcionario->rg=$request->rg;
        $funcionario->cpf=$request->cpf;
        $funcionario->telefone=$request->telefone;
        $funcionario->email=$request->email;
        $funcionario->nascimento=$request->data;
        $funcionario->sexo=$request->sexo;
        $funcionario->estado=$request->estado;
        $funcionario->cidade=$request->cidade;
        $funcionario->cep=$request->cep;
        $funcionario->endereco=$request->endereco;
        $funcionario->complemento=$request->complemento;
        $funcionario->obs=$request->obs;
        $funcionario->modalidade=$request->modalidade;
        $funcionario->salario=$request->salario;
        $funcionario->save();

        $usuario = new User();
        $usuario ->name=$request->nome;
        $usuario ->email=$request->email;
        $usuario->password = Hash::make($request->senha);
        $usuario ->save();
        return redirect()->route('funcionarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        return view('mostrarFuncionario',compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
