@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Editar Treino</title>
<style>

table {
  margin-top: 30px;
}

thead{
color: white;
background-color: #303030;
}

</style>
</head>
<link rel="stylesheet" href="../../site/style.css">
<h1 class="text-center"> Dados do Treino: {{$treino->titulo}} </h1> <hr>
    
<div class="text-center">
        <a href="{{route('treinos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-primary" form="editarTreino" name="editar" value="editar">Editar</button>
        <button type="submit" class="btn btn-success" form="editarTreino" name="criar" value="criar">Criar Exercicio</button>
      </div>  
<div class="container">
<form action="{{route('treinos.update',$treino->id)}}" method="POST" id="editarTreino">
@method('PUT')
@CSRF       
<table class="table text-center table-bordered">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Peso</th>
      <th scope="col" class="text-center">Repetições</th>
      <th scope="col" class="text-center">Series</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($exercicios as $exercicio)
    <tr>
      <td><input name="nome[]" type="text" class="form-control" pattern="[a-zA-Záãâéêíîóôõúç0-9\s]+$" title="Apenas Letras e Números!" id="nome[]" value="{{$exercicio->nome}}" required></td>
      <td><input name="peso[]" type="text" class="form-control" pattern="[0-9]+$" title="Apenas Números!" id="peso[]" value="{{$exercicio->peso}}" required></td>
      <td><input name="repeticoes[]" type="text" class="form-control" pattern="[0-9]+$" title="Apenas Números!" id="repeticoes[]" value="{{$exercicio->repeticoes}}" required></td>
      <td><input name="series[]" type="text" class="form-control" pattern="[0-9]+$" title="Apenas Números!" id="series[]" value="{{$exercicio->series}}" required></td>
      <td><button  type="submit" class="btn btn-danger" form="editarTreino" name="deletar" value="{{$exercicio->id}}">-</button></td>
    </tr>
    <input name="id[]" type="hidden" class="form-control" id="id[]" value="{{$exercicio->id}}">
    @endforeach
  </tbody>
</table>
</div>
</form>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>