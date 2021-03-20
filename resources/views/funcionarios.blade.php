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

.alert {
  margin-top: 30px;
}

.deletas{
  display:inline;
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
</style>
</head>
<h1 class="text-center"> Funcionarios </h1> <hr>
      <div class="text-center">
        <a href="{{route('funcionarios.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="{{route('funcionarios.desativadosF')}}">
          <button class="btn btn-secondary"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Desativados</button>
        </a>
      </div>  
      <div class="container"> 
      <form class="deletas" action="{{route('funcionarios.procurarF')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Funcionario" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
  <a href="{{route('funcionarios.index')}}">
          <button class="btn btn-warning lado" form="aa"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
        </a>
  </span>
  </div>
  </form>
  </div>
 <div class="container">  
 @if(session('funcionarioEditado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('funcionarioEditado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('funcionarioDeletado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('funcionarioDeletado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif    
@if(session('funcionarioCriado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('funcionarioCriado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif      
<table class="table text-center table-bordered table-responsive-sm">
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
        <a href="{{route('funcionarios.show',$funcionario->id)}}">
          <button class="btn btn-secondary" title="Exibir dados do funcionário"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
        </a>
        <a href="{{route('funcionarios.edit',$funcionario->id)}}">
          <button class="btn btn-primary" title="Editar dados do funcionário"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
        </a>
        <form class="deletas" action="{{route('funcionarios.destroy',$funcionario->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" title="Desativar funcionário" onclick="return confirm('Você tem certeza que deseja desativar o funcionario? ')"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></button>
        </form>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
<span>
{{ $funcionarios->render('pagination::bootstrap-4') }}
</span>
</div>
<script>
$(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});
</script>
@endsection