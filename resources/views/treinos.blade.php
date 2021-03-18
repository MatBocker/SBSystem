@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Treinos</title>
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
  margin-left: 5%;
}
</style>
</head>
<h1 class="text-center"> Treinos </h1> <hr>
      <div class="text-center">
        <a href="{{route('treinos.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
      </div>  
      <div class="container"> 
      <form class="deletas" action="{{route('treinos.procurarT')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Treino" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
  <a href="{{route('treinos.index')}}">
          <button class="btn btn-warning lado" form="aa"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
        </a>
  </span>
  </div>
  </form>
  </div>     
 <div class="container">     
 @if(session('treinoDeletado'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('treinoDeletado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
@if(session('impossivelTreino'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('impossivelTreino')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
<table class="table text-center table-bordered ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Id</th>
      <th scope="col" class="text-center">Titulo</th>
      <th scope="col" class="text-center">Observação</th>
      <th scope="col" class="text-center">Criado em</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($treinos as $treino)
    <tr>
    @if($treino->deleted_at==null)
      <th scope="row">{{$treino->id}}</th>
      <td>{{$treino->titulo}}</td>
      <td>{{$treino->observacao}}</td>
      <td>{{$treino->created_at}}</td>
      <td>
        <a href="{{route('treinos.show',$treino->id)}}">
          <button class="btn btn-secondary" title="Exibir dados do treino"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
        </a>
        <a href="{{route('treinos.edit',$treino->id)}}">
          <button class="btn btn-primary" title="Editar dados do treino"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
        </a>
        <form class="deletas" action="{{route('treinos.destroy',$treino->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" title="Excluir treino do sistema" onclick="return confirm('Você tem certeza que deseja excluir o treino? ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
        </form>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
<script>
$(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});
</script>
@endsection