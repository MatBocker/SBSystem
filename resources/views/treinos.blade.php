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

</style>
</head>
<h1 class="text-center"> Treinos </h1> <hr>
      <div class="text-center">
        <a href="{{route('treinos.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
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
          <button class="btn btn-secondary">Exibir</button>
        </a>
        <a href="{{route('treinos.edit',$treino->id)}}">
          <button class="btn btn-primary">Editar</button>
        </a>
        <form class="deletas" action="{{route('treinos.destroy',$treino->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja excluir o treino? ')">Desativar</button>
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