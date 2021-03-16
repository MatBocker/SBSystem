@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Funcionários</title>
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
<h1 class="text-center"> Funcionarios </h1> <hr>
      <div class="text-center">
        <a href="{{route('funcionarios.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
      </div>  
 <div class="container">     
<table class="table text-center table-bordered ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Id</th>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">CPF</th>
      <th scope="col" class="text-center">Sexo</th>
      <th scope="col" class="text-center">Email</th>
      <th scope="col" class="text-center">Salario</th>
      <th scope="col" class="text-center">Modalidade</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($funcionarios as $funcionario)
    <tr>
    @if($funcionario->deleted_at==null)
      <th scope="row">{{$funcionario->id}}</th>
      <td>{{$funcionario->nome}}</td>
      <td>{{$funcionario->cpf}}</td>
      <td>{{$funcionario->sexo}}</td>
      <td>{{$funcionario->email}}</td>
      <td>{{$funcionario->salario}}</td>
      <td>{{$funcionario->modalidade}}</td>
      <td>
        <a href="#">
          <button class="btn btn-secondary">Exibir</button>
        </a>
        <a href="#">
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