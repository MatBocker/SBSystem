@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Planos</title>
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
.redondo
{
  margin-left: 5px;
}
</style>
</head>
<h1 class="text-center"> Planos </h1> <hr>
      <div class="text-center">
        <a href="{{route('planos.create')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="{{route('planos.desativados')}}">
          <button class="btn btn-secondary">Desativados</button>
        </a>
      </div>  
      <div class="container"> 
      <form class="deletas" action="{{route('planos.procurarP')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Planos" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary">Buscar</button>
  <a href="{{route('planos.index')}}">
          <button class="btn btn-warning redondo" form="aa">Recarregar</button>
        </a>
  </span>
  </div>
  </form>
  </div>
 <div class="container">     
 @if(session('impossivelDeletarPlano'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('impossivelDeletarPlano')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('planoDeletado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('planoDeletado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('planoEditado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('planoEditado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('planoCriado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('planoCriado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<table class="table text-center table-bordered ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Id</th>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Preço</th>
      <th scope="col" class="text-center">Tipo</th>
      <th scope="col" class="text-center">Criado em:</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($planos as $plano)
  @if($plano->deleted_at==null)
    <tr>
      <th scope="row">{{$plano->id}}</th>
      <td>{{$plano->nome}}</td>
      <td>{{$plano->preco}}</td>
      <td>{{$plano->tipo}}</td>
      <td>{{$plano->created_at}}</td>
      <td>
        <a href="{{route('planos.show',$plano->id)}}">
          <button class="btn btn-secondary">Exibir</button>
        </a>
        <a href="{{route('planos.edit',$plano->id)}}">
          <button class="btn btn-primary">Editar</button>
        </a>
        <form class="deletas" action="{{route('planos.destroy',$plano->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja desativar o plano? ')">Desativar</button>
        </form>
      </td>
      @endif
    </tr>
    
    @endforeach
  </tbody>
</table>
<span>
{{ $planos->render('pagination::bootstrap-4') }}
</span>
</div>
<script>
$(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});
</script>
@endsection