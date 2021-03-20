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

.lado
{
  margin-left: 5px;
}
</style>
</head>
<h1 class="text-center"> Planos Desativados </h1> <hr>
      <div class="text-center">
      <a href="{{route('planos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
       
      </div>  
      <div class="container"> 
      <form class="deletas" action="{{route('planos.procurarDP')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Plano" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary">Buscar</button>
  <a href="{{route('planos.desativados')}}">
          <button class="btn btn-warning lado" form="aa">Recarregar</button>
        </a>
  </span>
  </div>
  </form>
  </div>
 <div class="container">   
 @if(session('planoRestaurado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('planoRestaurado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
@if(session('planoExcluido'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('planoExcluido')}}</strong>
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
      <th scope="col" class="text-center">Preço</th>
      <th scope="col" class="text-center">Tipo</th>
      <th scope="col" class="text-center">Desativando em</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($planos as $plano)
  @if($plano->deleted_at!=null)
    <tr>
      <th scope="row">{{$plano->id}}</th>
      <td>{{$plano->nome}}</td>
      <td>{{$plano->preco}}</td>
      <td>{{$plano->tipo}}</td>
      <td>{{$plano->updated_at}}</td>
      <td>
      <form class="deletas" action="{{route('planos.restore',$plano->id)}}" method="post">  
        @method('patch')
        @CSRF
        <button type="submit" class="btn btn-success" title="Restaurar plano" onclick="return confirm('Você tem certeza que deseja restaurar o plano? ')"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
        </form>
        <form class="deletas" action="{{route('planos.excluirPermanente',$plano->id)}}" method="get">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" title="Excluir plano do sistema" onclick="return confirm('Você tem certeza que deseja excluir permanentemente? ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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