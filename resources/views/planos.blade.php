@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Planos</title>
</head>
<h1 class="text-center"> Planos </h1> <hr>
      <div class="text-center">
        <a href="{{route('planos.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="{{route('planos.desativados')}}">
          <button class="btn btn-secondary">Desativados</button>
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
  @if($plano->deleted_at==null)
    <tr>
      <th scope="row">{{$plano->id}}</th>
      <td>{{$plano->nome}}</td>
      <td>{{$plano->preco}}</td>
      <td>{{$plano->tipo}}</td>
      <td>{{$plano->observacao}}</td>
      <td>
        <a href="{{route('planos.show',$plano->id)}}">
          <button class="btn btn-secondary">Exibir</button>
        </a>
        <a href="{{route('planos.edit',$plano->id)}}">
          <button class="btn btn-primary">Editar</button>
        </a>
        <form action="{{route('planos.destroy',$plano->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja desativar o plano? ')">Desativar</button>
        </form>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection