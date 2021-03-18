@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Despesas Pagas</title>
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
.modal-body{
  word-break: break-all;
}

</style>
</head>
<h1 class="text-center"> Despesas Pagas </h1> <hr>
      <div class="text-center">
        <a href="{{route('despesas.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
      <div class="container"> 
      <form class="deletas" action="{{route('despesas.procurarDD')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Despesa" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary">Buscar</button>
  <a href="{{route('despesas.pagas')}}">
          <button class="btn btn-warning redondo" form="aa">Recarregar</button>
        </a>
  </span>
  </div>
  </form>
  </div>
 <div class="container">     
 @if(session('despesaPExcluida'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('despesaPExcluida')}}</strong>
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
      <th scope="col" class="text-center">Valor</th>
      <th scope="col" class="text-center">Data de Pagamento</th>
      <th scope="col" class="text-center">Validade</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($despesas as $despesa)
  @if($despesa->deleted_at!=null)
    <tr>
      <th scope="row">{{$despesa->id}}</th>
      <td>{{$despesa->titulo}}</td>
      <td>R$ {{$despesa->valor}}</td>
      <td>{{$despesa->updated_at}}</td>
      <td>{{$despesa->validade}}</td>
      <td>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong{{$despesa->id}}">Exibir</button>
<div class="modal fade" id="exampleModalLong{{$despesa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongLabel">{{$despesa->titulo}}</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4 style="display:inline;">Valor da despesa:</h4> <h4 style="display:inline;"><strong>R${{$despesa->valor}}</strong></h4>
      <p><h4  style="display:inline;">Foi criada em:</h4> <h4 style="display:inline;"><strong>{{$despesa->criada}}</strong></h4></p>
      <p><h4 style="display:inline;">Precisa ser paga até:</h4> <h4 style="display:inline;"><strong>{{$despesa->validade}}</strong></h4></p>
      <p><h4 style="display:inline;">Data de pagamento:</h4> <h4 style="display:inline;"><strong>{{$despesa->updated_at}}</strong></h4></p>
      <p><h4 style="display:inline;">Observações:</h3></p>
      <p><h4><strong>{{$despesa->observacao}}</strong></h4></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>
<form class="deletas" action="{{route('despesas.excluirPaga',$despesa->id)}}" method="get">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja excluir permanentemente? ')">Excluir</button>
        </form>
</td>
@endif
    </tr>
    
    @endforeach
  </tbody>
</table>
<span>
{{ $despesas->render('pagination::bootstrap-4') }}
</span>
</div>
<script>
$(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});
</script>
@endsection