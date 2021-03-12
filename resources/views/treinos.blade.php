@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Treinos</title>
<style>

table {
  margin-top: 30px;
}

thead{
color: white;
background-color: #303030;
}

</style>
</head>
<h1 class="text-center"> Treinos </h1> <hr>
      <div class="text-center">
        <a href="{{route('treinos.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
      </div>  
 <div class="container">     
<table class="table text-center table-bordered ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Id</th>
      <th scope="col" class="text-center">Titulo</th>
      <th scope="col" class="text-center">Observação</th>
      <th scope="col" class="text-center">Criado em</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($treinos as $treino)
    <tr>
    @if($treino->deleted_at==null)
      <th scope="row">{{$treino->id}}</th>
      <td>{{$treino->titulo}}</td>
      <td>{{$treino->observacao}}</td>
      <td>{{$treino->created_at}}</td>
      <td>
        <a href="{{route('treinos.show',$treino->id)}}">
          <button class="btn btn-secondary">Exibir</button>
        </a>
        <a href="{{route('treinos.edit',$treino->id)}}">
          <button class="btn btn-primary">Editar</button>
        </a>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection