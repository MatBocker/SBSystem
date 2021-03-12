@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Visualizar Treino</title>
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
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Dados do Treino: {{$treino->titulo}} </h1> <hr>
<div class="text-center">
        <a href="{{route('treinos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
<div class="container">     
<table class="table text-center table-bordered ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Peso</th>
      <th scope="col" class="text-center">Repetições</th>
      <th scope="col" class="text-center">Series</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($exercicios as $exercicio)
    <tr>
      <td>{{$exercicio->nome}}</td>
      <td>{{$exercicio->peso}}kg</td>
      <td>{{$exercicio->repeticoes}}</td>
      <td>{{$exercicio->series}}</td>
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>



@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>