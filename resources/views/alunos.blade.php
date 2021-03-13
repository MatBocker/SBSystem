@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Alunos</title>
<style>
.deletas{
  display:inline;
}
</style>
</head>
<h1 class="text-center"> Alunos </h1> <hr>
      <div class="text-center">
        <a href="{{route('alunos.cadastrar')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="{{route('alunos.desativadosA')}}">
          <button class="btn btn-secondary">Desativados</button>
        </a>
      </div>  
 <div class="container">     
<table class="table text-center ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Matricula</th>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">CPF</th>
      <th scope="col" class="text-center">Sexo</th>
      <th scope="col" class="text-center">Telefone</th>
      <th scope="col" class="text-center">Email</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($alunos as $alunos)
    <tr>
    @if($alunos->deleted_at==null)
      <th scope="row">{{$alunos->id}}</th>
      <td>{{$alunos->nome}}</td>
      <td>{{$alunos->cpf}}</td>
      <td>{{$alunos->sexo}}</td>
      <td>{{$alunos->telefone}}</td>
      <td>{{$alunos->email}}</td>
      <td>
        <a href="{{route('alunos.show',$alunos->id)}}">
          <button class="btn btn-secondary">Exibir</button>
        </a>
       
        <a href="{{route('alunos.edit',$alunos->id)}}">
          <button class="btn btn-primary">Editar</button>
        </a>
        <a href="{{route('alunos.ava',$alunos->id)}}">
          <button class="btn btn-primary">Avaliações</button>
        </a>
       
      <form class="deletas" action="{{route('alunos.destroy',$alunos->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja desativar o aluno? ')">Desativar</button>
        </form>
        </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection