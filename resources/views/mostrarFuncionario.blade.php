@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Visualizar Funcionario</title>
</head>
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Dados de {{$funcionario->nome}} </h1> <hr>
<div class="text-center">
        <a href="{{route('funcionarios.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
<div class="container">

<div class="h4">
<span>Id: {{$funcionario->id}}</span><br><br>     
<span>Nome: {{$funcionario->nome}}</span><br><br> 
<span>Salario: {{$funcionario->salario}}</span><br><br> 
<span>Modalidade: {{$funcionario->modalidade}}</span><br><br>
<span>RG: {{$funcionario->rg}}</span><br><br> 
<span>CPF: {{$funcionario->cpf}}</span><br><br> 
<span>Sexo: {{$funcionario->sexo}}</span><br><br> 
<span>Telefone: {{$funcionario->telefone}}</span><br><br> 
<span>Email: {{$funcionario->email}}</span><br><br> 
<span>Endereço: {{$funcionario->endereco}}</span><br><br>
<span>Estado: {{$funcionario->estado}}</span><br><br>
<span>Cidade: {{$funcionario->cidade}}</span><br><br>
<span>Cep: {{$funcionario->cep}}</span><br><br>  
<span>Observação: {{$funcionario->obs}}</span><br><br> 
</div>
</div>



@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>