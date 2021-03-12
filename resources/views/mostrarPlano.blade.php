@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Visualizar Plano</title>
</head>
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Dados de {{$plano->nome}} </h1> <hr>
<div class="container">
<div class="text-center">
        <a href="{{route('planos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
<div class="h4">
<span>Id: {{$plano->id}}</span><br><br>     
<span>Nome: {{$plano->nome}}</span><br><br> 
<span>Preço: {{$plano->preco}}</span><br><br> 
<span>Tipo: {{$plano->tipo}}</span><br><br> 
<span>Observação: {{$plano->observacao}}</span><br><br> 

</div>
</div>



@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>