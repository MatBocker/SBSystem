@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Avaliações Físicas</title>
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
<h1 class="text-center"> Avaliações Físicas de {{$aluno->nome}} </h1> <hr>
<div class="text-center">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
<div class="container">
<table class="table text-center table-bordered ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Id</th>
      <th scope="col" class="text-center">Idade</th>
      <th scope="col" class="text-center">Peso</th>
      <th scope="col" class="text-center">IMC</th>
      <th scope="col" class="text-center">Criado em</th>
      <th scope="col" class="text-center">Ação</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($avaliacoes as $avaliacao)
    <tr>
      <th scope="row">{{$avaliacao->id}}</th>
      <td>{{$avaliacao->idade}}</td>
      <td>{{$avaliacao->peso}}</td>
      <td>{{$avaliacao->imc}}</td>
      <td>{{$avaliacao->created_at}}</td>
      <td>
        <a href="{{route('alunos.mostraAva',$avaliacao->id)}}">
          <button class="btn btn-secondary">Exibir</button>
        </a>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>