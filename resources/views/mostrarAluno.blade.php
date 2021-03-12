@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Visualizar Aluno</title>
</head>
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Dados de {{$aluno->nome}} </h1> <hr>
<div class="text-center">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
<div class="container">

<div class="h4">
<span>Matricula: {{$aluno->id}}</span><br><br>     
<span>Nome: {{$aluno->nome}}</span><br><br> 
<span>RG: {{$aluno->rg}}</span><br><br> 
<span>CPF: {{$aluno->cpf}}</span><br><br> 
<span>Sexo: {{$aluno->sexo}}</span><br><br> 
<span>Telefone: {{$aluno->telefone}}</span><br><br> 
<span>Email: {{$aluno->email}}</span><br><br> 
<span>Endereço: {{$aluno->endereco}}</span><br><br> 
<span>Status: Ativo</span><br><br> 
<span>Observação: {{$aluno->obs}}</span><br><br> 
<span>Treino: {{$aluno->treino->titulo}}</span><br><br> 
<span>Plano: {{$aluno->plano->nome}}</span><br><br> 
</div>
</div>



@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>

