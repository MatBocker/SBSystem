@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Alunos</title>
</head>
<h1 class="text-center"> Alunos Desativados </h1> <hr>
      <div class="text-center">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
 <div class="container">     
<table class="table text-center ">
  <thead class="text-center">
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Sexo</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($alunos as $aluno)
    <tr>
    @if($aluno->deleted_at!=null)
      <th scope="row">{{$aluno->id}}</th>
      <td>{{$aluno->nome}}</td>
      <td>{{$aluno->cpf}}</td>
      <td>{{$aluno->sexo}}</td>
      <td>{{$aluno->telefone}}</td>
      <td>{{$aluno->email}}</td>
      <td>
      <form action="{{route('alunos.restore',$aluno->id)}}" method="post">  
        @method('patch')
        @CSRF
        <button type="submit" class="btn btn-success" onclick="return confirm('Você tem certeza que deseja reativar o aluno? ')">Restaurar</button>
        </form>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection