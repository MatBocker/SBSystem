@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Planos</title>
</head>
<h1 class="text-center"> Planos </h1> <hr>
      <div class="text-center">
      <a href="{{route('planos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
 <div class="container">     
<table class="table text-center ">
  <thead class="text-center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Tipo</th>
      <th scope="col">Observação</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($planos as $plano)
  @if($plano->deleted_at!=null)
    <tr>
      <th scope="row">{{$plano->id}}</th>
      <td>{{$plano->nome}}</td>
      <td>{{$plano->preco}}</td>
      <td>{{$plano->tipo}}</td>
      <td>{{$plano->observacao}}</td>
      <td>
      <form action="{{route('planos.restore',$plano->id)}}" method="post">  
        @method('patch')
        @CSRF
        <button type="submit" class="btn btn-success" onclick="return confirm('Você tem certeza que deseja reativar o plano? ')">Restaurar</button>
        </form>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection