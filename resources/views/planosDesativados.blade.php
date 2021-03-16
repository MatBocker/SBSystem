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
</style>
</head>
<h1 class="text-center"> Planos Desativados </h1> <hr>
      <div class="text-center">
      <a href="{{route('planos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
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
<table class="table text-center table-bordered">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Id</th>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Preço</th>
      <th scope="col" class="text-center">Tipo</th>
      <th scope="col" class="text-center">Observação</th>
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
      <td>{{$plano->observacao}}</td>
      <td>
      <form action="{{route('planos.restore',$plano->id)}}" method="post">  
        @method('patch')
        @CSRF
        <button type="submit" class="btn btn-success" onclick="return confirm('Você tem certeza que deseja reativar o plano? ')">Restaurar</button>
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