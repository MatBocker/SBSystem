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

.h4, .h5 {
  display:inline;
  }

.alert {
  margin-top: 30px;
}
  
</style>
</head>
<h1 class="text-center"> Alunos Desativados </h1> <hr>
      <div class="text-center">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
 <div class="container">    
 @if(session('alunoRestaurado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('alunoRestaurado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif  
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
<script>
$(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});
</script>
@endsection