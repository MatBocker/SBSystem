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
<h1 class="text-center"> Funcionarios Desativados </h1> <hr>
      <div class="text-center">
      <a href="{{route('funcionarios.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
 <div class="container">  
 <div class="container"> 
      <form class="deletas" action="{{route('funcionarios.procurarDF')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Funcionario" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary">Buscar</button>
  <a href="{{route('funcionarios.desativadosF')}}">
          <button class="btn btn-warning lado" form="aa">Recarregar</button>
        </a>
  </span>
  </div>
  </form>
  </div>
@if(session('funcionarioRestaurado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('funcionarioRestaurado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif   
@if(session('funcExcluido'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('funcExcluido')}}</strong>
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
    @if($funcionario->deleted_at!=null)
      <th scope="row">{{$funcionario->id}}</th>
      <td>{{$funcionario->nome}}</td>
      <td>{{$funcionario->cpf}}</td>
      <td>{{$funcionario->sexo}}</td>
      <td>{{$funcionario->email}}</td>
      <td>{{$funcionario->salario}}</td>
      <td>{{$funcionario->modalidade}}</td>
      <td>
      <form class="deletas" action="{{route('funcionarios.restore',$funcionario->id)}}" method="post">  
        @method('patch')
        @CSRF
        <button type="submit" class="btn btn-success" title="Restaurar funcionário" onclick="return confirm('Você tem certeza que deseja restaurar o funcionario? ')"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
        </form>
        <form class="deletas" action="{{route('funcionarios.excluirPermanente',$funcionario->id)}}" method="get">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" title="Excluir funcionário do sistema" onclick="return confirm('Você tem certeza que deseja excluir permanentemente? ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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