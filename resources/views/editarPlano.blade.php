@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Editar Plano</title>
<style>
.botoes
{
  margin-bottom: 20px;
}
</style>
</head>
<link rel="stylesheet" href="../../site/style.css">
<h1 class="text-center"> Editar {{ $plano->nome }} </h1> <hr>


<div class="container"> 
<div class="text-center botoes">
        <a href="{{route('planos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-primary" form="editarPlano">Editar</button>
</div>
<form action="{{route('planos.update',$plano->id)}}" method="POST" id="editarPlano">
@method('PUT')
@CSRF
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input name="nome" type="text" class="form-control" pattern="[a-zA-Záãâéêíîóôõú0-9\s]+$" title="Apenas Letras e Números!" id="nome" value="{{ $plano->nome }}" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="preco">Preço</label>
      <input name="preco" type="text" class="form-control" pattern="^\d+\.{0,1}\d{0,2}$" title="Apenas numeros, pontos e 2 casas decimais!" id="preco" value="{{ $plano->preco }}" required>
    </div>
    <div class="form-group col-md-3">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo" class="form-control" required>
        <option selected>{{ $plano->tipo }}</option>
        <option value="Mensal">Mensal</option>
        <option value="Anual">Anual</option>
        </select>
    </div>
    <div class="form-group col-md-6">
    <label for="obs">Observação</label>
    <textarea name="obs" class="form-control" id="obs" rows="2" required>{{ $plano->observacao }}</textarea>
    </div>
    </div>
</form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('../site/script.js') }}"></script>