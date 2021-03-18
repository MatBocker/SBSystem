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
        $funcionarios = DB::table('funcionarios')->whereNull('deleted_at')->Paginate(9);
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
        return redirect()->route('funcionarios.index')->with('funcionarioCriado', 'Funcionário criado com sucesso!!');
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
    public function edit(Funcionario $funcionario)
    {
        return view('editarFuncionario',compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $funcionario = Funcionario::find($funcionario->id);
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
        return redirect()->route('funcionarios.index')->with('funcionarioEditado', 'Alterações feita com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario=Funcionario::find($funcionario->id);
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('funcionarioDeletado', 'Funcionário desativado com sucesso!! Caso queria restaurar clique na aba desativados!');
    }

    public function desativadosF()
    {
        $funcionarios = DB::table('funcionarios')->whereNotNull('deleted_at')->Paginate(9);
        return view('funcionariosDesativados', ['funcionarios' => $funcionarios]);
    }

    public function restore($id)
    {
        Funcionario::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('funcionarioRestaurado', 'Funcionário restaurado com sucesso!!');
        
    }
    function procurarF(Request $request)
    {
        $procura=$request->search;
        $func=DB::table('funcionarios')->where('nome','LIKE','%'.$procura.'%')->paginate();
        return view('funcionarios', ['funcionarios' => $func]);
    }

    function procurarDF(Request $request)
    {
        $procura=$request->search;
        $func=DB::table('funcionarios')->where('nome','LIKE','%'.$procura.'%')->paginate();
        return view('funcionariosDesativados', ['funcionarios' => $func]);
    }

    function excluirPermanente($id)
    {
        $func=Funcionario::withTrashed()->find($id);
        $usuario = User::all();
        foreach($usuario as $usu)
            {
                if($usu->email==$func->email)
                {
                    $usu->delete();
                }
            }

        $func->forceDelete();   
        return redirect()->back()->with('funcExcluido', 'Funcionario excluido permanentemente com sucesso!!');
    }
}
