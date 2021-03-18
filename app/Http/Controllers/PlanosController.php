<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planos = DB::table('planos')->whereNull('deleted_at')->Paginate(9);
        return view('planos', ['planos' => $planos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criarPlano');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plano=new plano();
        $plano->nome=$request->nome;
        $plano->preco=$request->preco;
        $plano->tipo=$request->tipo;
        $plano->observacao=$request->obs;
        $plano->save();
        return redirect()->route('planos.index')->with('planoCriado', 'Plano criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plano $plano)
    {
        return view('mostrarPlano',compact('plano'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(plano $plano)
    {
        return view('editarPlano',compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plano $plano)
    {
        $plano=plano::find($plano->id);
        $plano->nome=$request->nome;
        $plano->preco=$request->preco;
        $plano->tipo=$request->tipo;
        $plano->observacao=$request->obs;
        $plano->save();
        return redirect()->route('planos.index')->with('planoEditado', 'Alterações feita com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(plano $plano)
    {
        $plano=plano::find($plano->id);
        if ($plano -> aluno () -> count ()) 
        { 
            return redirect()->route('planos.index')->with('impossivelDeletarPlano', 'Impossivel desativar... Plano ja está cadastrado em um aluno');
        }
        else{
            $plano->delete();
            return redirect()->route('planos.index')->with('planoDeletado', 'Plano desativado com sucesso!! Caso queria restaurar clique na aba desativados!');;
        }  
        
    }

    public function desativados()
    {
        $planos = DB::table('planos')->whereNotNull('deleted_at')->paginate(9);
        return view('planosDesativados', ['planos' => $planos]);
    }

    public function restore($id)
    {
        Plano::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('planoRestaurado', 'Plano restaurado com sucesso!!');
        
    }
    function procurarP(Request $request)
    {
        $procura=$request->search;
        $planos=DB::table('planos')->where('nome','LIKE','%'.$procura.'%')->paginate();
        return view('planos', ['planos' => $planos]);
    }
    function procurarDP(Request $request)
    {
        $procura=$request->search;
        $planos=DB::table('planos')->where('nome','LIKE','%'.$procura.'%')->paginate();
        return view('planosDesativados', ['planos' => $planos]);
    }
    function excluirPermanente($id)
    {
        $plano=plano::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('planoExcluido', 'Plano excluido permanentemente com sucesso!!');
    }
}
