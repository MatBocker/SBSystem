@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Alunos</title>
<style>
.deletas{
  display:inline;
}

table {
  margin-top: 30px;
}

thead{
color: white;
background-color: #303030;
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
<table class="table text-center table-bordered ">
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
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Avaliação</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Avaliação Física</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        O que deseja fazer?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Voltar</button>
        <a href="{{route('alunos.ultimaAva',$alunos->id)}}">
          <button class="btn btn-primary">Ultima avaliação</button>
        </a>
        <a href="#">
          <button class="btn btn-success">Fazer avaliação física</button>
        </a>
        <a href="{{route('alunos.ava',$alunos->id)}}">
          <button class="btn btn-warning">Histórico de avaliações</button>
        </a>
      </div>
    </div>
  </div>
</div>
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