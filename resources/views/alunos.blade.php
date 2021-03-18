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


.alert {
  margin-top: 10px;

}
.h4 .h5
{
  display: inline;
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
<h1 class="text-center"> Alunos </h1> <hr>
      <div class="text-center">
        <a href="{{route('alunos.cadastrar')}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="{{route('alunos.desativadosA')}}">
          <button class="btn btn-secondary">Desativados</button>
        </a>
      </div>
      <div class="container"> 
      <form class="deletas" action="{{route('alunos.procurar')}}" method="get">
      <div class="form-group">
      <div class="input-group">
  <input type="text" name="search" id="search" class="form-control col-md-4" placeholder="Buscar Aluno" />
  <span class="input-group-btn">
  <button  type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></button>
  <a href="{{route('alunos.index')}}">
          <button class="btn btn-warning lado" form="aa"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
        </a>
  </span>
  </div>
  </form>
  </div>
 <div class="container">   
 
 @if(session('semAvaliacao'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('semAvaliacao')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
@if(session('alunoDeletado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('alunoDeletado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
@if(session('avaliacaoCriada'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('avaliacaoCriada')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
@if(session('alunoEditado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('alunoEditado')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 
@if(session('alunoCriado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('alunoCriado')}}</strong>
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
    @if($aluno->deleted_at==null)
      <th scope="row">{{$aluno->id}}</th>
      <td>{{$aluno->nome}}</td>
      <td>{{$aluno->cpf}}</td>
      <td>{{$aluno->sexo}}</td>
      <td>{{$aluno->telefone}}</td>
      <td>{{$aluno->email}}</td>
      <td>
        <a href="{{route('alunos.show',$aluno->id)}}">
          <button class="btn btn-secondary" title="Exibir dados do aluno">
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
        </a>
       
        <a href="{{route('alunos.edit',$aluno->id)}}">
          <button class="btn btn-primary" title="Editar dados do aluno"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
        </a>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$aluno->id}}" title="Avaliação Física"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></button>
        <div class="modal fade" id="exampleModal{{$aluno->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Avaliação Física</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="h4"><strong>Ultima avaliação:</strong></p> <p class="h5">Veja a ultima avaliação física feita no aluno.</p><br><br>
      <p class="h4"><strong>Fazer avaliação física:</strong></p> <p class="h5">Faça uma nova avaliação física no aluno.</p><br><br>
      <p class="h4"><strong>Histórico de avaliações:</strong></p><p class="h5"> Veja todas a avaliações físicas já feita no aluno.</p><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Voltar</button>
        <a href="{{route('alunos.ultimaAva',$aluno->id)}}">
          <button class="btn btn-primary">Ultima avaliação</button>
        </a>
        <a href="{{route('alunos.criarAva',$aluno->id)}}">
          <button class="btn btn-success">Fazer avaliação física</button>
        </a>
        <a href="{{route('alunos.ava',$aluno->id)}}">
          <button class="btn btn-warning">Histórico de avaliações</button>
        </a>
      </div>
    </div>
  </div>
</div>
      <form class="deletas" action="{{route('alunos.destroy',$aluno->id)}}" method="POST">  
        @method('delete')
        @CSRF
        <button  type="submit" class="btn btn-danger" title="Desativar aluno" onclick="return confirm('Você tem certeza que deseja desativar o aluno? ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
$(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-dismissible").remove();
});

</script>
@endsection