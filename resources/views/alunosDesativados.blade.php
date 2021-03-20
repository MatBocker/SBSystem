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
  

#search
{
  display: inline;
  margin-top: 10px;
  margin-bottom: 10px;
}

.lado
{
  margin-left: 5px;
}

body
{
 background-color: #F5F5F5;
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
      <form class="deletas" action="{{route('alunos.procurarDesativados')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Aluno" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
  <a href="{{route('alunos.desativadosA')}}">
          <button class="btn btn-warning lado" form="aa"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
        </a>
  </span>
  </div>
  </form>
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
@if(session('alunoExcluido'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('alunoExcluido')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif  
<table class="table text-center table-bordered table-responsive-md ">
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
      <form class="deletas"  action="{{route('alunos.restore',$aluno->id)}}" method="post">  
        @method('patch')
        @CSRF
        <button type="submit" class="btn btn-success" title="Restaurar aluno" onclick="return confirm('Você tem certeza que deseja restaurar o aluno? ')"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
        </form>
        <form class="deletas" action="{{route('alunos.excluirPermanente',$aluno->id)}}" method="get">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" title="Excluir aluno do sistema" onclick="return confirm('Você tem certeza que deseja excluir permanentemente? ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </form>

      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
<span>
{{ $alunos->render('pagination::bootstrap-4') }}
</span>
</div>
<script>
$(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});
</script>
@endsection