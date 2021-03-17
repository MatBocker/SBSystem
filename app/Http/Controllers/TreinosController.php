<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treino;
use App\Models\Plano;
use App\Models\Exercicio;
use Illuminate\Support\Facades\DB;

class TreinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treinos = DB::table('treinos')->get();
        return view('treinos', ['treinos' => $treinos]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criarTreino');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $treino = new treino();
        $treino->titulo=$request->titulo;
        $treino->observacao=$request->obs;
        $treino->save();
        foreach($request->nome as $exerc=>$v)
        {
            $data=array(
                'nome' => $request->nome[$exerc],
                'peso' => $request->peso[$exerc],
                'repeticoes' => $request->repeticoes[$exerc],
                'series' => $request->series[$exerc],
            );
        $treino=treino::find($treino->id);
        $treino->exercicio()->create($data)->save();
        }
        
        return redirect()->route('treinos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(treino $treino)
    {
        $exercicios = treino::find($treino->id)->exercicio;
        return view('mostrarTreino',compact('exercicios','treino'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(treino $treino)
    {
        
        $exercicios = treino::find($treino->id)->exercicio;
        return view('editarTreino',compact('exercicios','treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercicio $exercicio,$id)
    {
        if($request->has('criar'))
        {
            foreach($request->id as $exerc=>$v)
        {
            $data=array(
                'nome' => $request->nome[$exerc],
                'peso' => $request->peso[$exerc],
                'repeticoes' => $request->repeticoes[$exerc],
                'series' => $request->series[$exerc],
            );
        $exercicio=Exercicio::where('id',$request->id[$exerc])->first();
        $exercicio->update($data);
        }
            $cri=new Exercicio();
            $cri->nome='novo';
            $cri->peso='0';
            $cri->repeticoes='0';
            $cri->series='0';
            $cri->treino_id=$id;
            $cri->save();
            
        return back();
        }
        if($request->has('editar')){

        foreach($request->id as $exerc=>$v)
        {
            $data=array(
                'nome' => $request->nome[$exerc],
                'peso' => $request->peso[$exerc],
                'repeticoes' => $request->repeticoes[$exerc],
                'series' => $request->series[$exerc],
            );
        $exercicio=Exercicio::where('id',$request->id[$exerc])->first();
        $exercicio->update($data);
        }
        return redirect()->route('treinos.index');
    }
        if($request->has('deletar'))
        {
            
        $exercicio=Exercicio::whereIn('id', [$request->deletar]);
        $exercicio->delete();
        return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(treino $treino)
    {
        $treino=treino::find($treino->id);
        if ($treino -> aluno () -> count ()) 
        {
            return redirect()->route('treinos.index')->with('impossivelTreino', 'Impossivel excluir... Treino ja está cadastrado em um aluno!');
        }
        else{
            $exercicio = Exercicio::all();
            foreach($exercicio as $exe)
            {
                if($exe->treino_id==$treino->id)
                {
                    $exe->delete();
                }
            }
            $treino->delete();
            return redirect()->route('treinos.index')->with('treinoDeletado', 'Treino excluido com sucesso!!');
        }
        
    }
    function procurarT(Request $request)
    {
        $procura=$request->search;
        $treinos=DB::table('treinos')->where('titulo','LIKE','%'.$procura.'%')->paginate();
        return view('treinos', ['treinos' => $treinos]);
    }
}
