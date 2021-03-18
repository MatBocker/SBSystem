<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despesas = DB::table('despesas')->whereNull('deleted_at')->orderBy('validade', 'asc')->Paginate(9);
        return view('despesas', ['despesas' => $despesas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criarDespesa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $despesa=new Despesa();
        $despesa->titulo=$request->nome;
        $despesa->valor=$request->valor;
        $despesa->observacao=$request->obs;
        $despesa->criada=$request->criada;
        $despesa->validade=$request->validade;
        $despesa->save();
        return redirect()->route('despesas.index')->with('despesaCriada', 'Despesa criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {
        return view('editarDespesa',compact('despesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesa $despesa)
    {
        $despesa = Despesa::find($despesa->id);
        $despesa->titulo=$request->nome;
        $despesa->valor=$request->valor;
        $despesa->observacao=$request->obs;
        $despesa->criada=$request->criada;
        $despesa->validade=$request->validade;
        $despesa->save();
        return redirect()->route('despesas.index')->with('despesaEditada', 'Alterações feita com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa $despesa)
    {
        $despesa=Despesa::find($despesa->id);
        $despesa->delete();
        return redirect()->route('despesas.index')->with('despesaPaga', 'Despesa paga com sucesso!!');
    }

    public function pagas()
    {
        $despesas = DB::table('despesas')->whereNotNull('deleted_at')->orderBy('updated_at', 'desc')->paginate(9);
        return view('despesasPagas', ['despesas' => $despesas]);
    }

    function excluir($id)
    {
        $despesa=Despesa::find($id)->forceDelete();
        return redirect()->back()->with('despesaExcluida', 'Despesa excluida permanentemente com sucesso!!');
    }

    function excluirPaga($id)
    {
        $despesa=Despesa::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('despesaPExcluida', 'Despesa excluida permanentemente com sucesso!!');
    }

    function procurarD(Request $request)
    {
        $procura=$request->search;
        $despesas=DB::table('despesas')->where('titulo','LIKE','%'.$procura.'%')->paginate();
        return view('despesas', ['despesas' => $despesas]);
    }
    function procurarDD(Request $request)
    {
        $procura=$request->search;
        $despesas=DB::table('despesas')->where('titulo','LIKE','%'.$procura.'%')->paginate();
        return view('despesasPagas', ['despesas' => $despesas]);
    }
}
