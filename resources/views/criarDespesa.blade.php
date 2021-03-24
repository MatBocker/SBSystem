@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Cadastro de Despesa</title>
<style>
.botoes
{
  margin-bottom: 20px;
}
</style>
</head>
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Cadastrar Despesa </h1> <hr>


<div class="container"> 
<div class="text-center botoes">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success" form="criarDespesa">Cadastrar</button>
</div>
<form action="{{route('despesas.store')}}" method="POST" id="criarDespesa">
@CSRF
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Titulo</label>
      <input name="nome" type="text" class="form-control" pattern="[a-zA-Záãâéêíîóôõú0-9\s]+$" title="Apenas Letras e Números!" id="nome" placeholder="" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="valor">Valor</label>
      <input name="valor" type="text" class="form-control" pattern="^\d+\.{0,1}\d{0,2}$" title="Apenas numeros, pontos e 2 casas decimais!" id="valor" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="criada">Data de criação da despesa</label>
      <input name="criada" type="date" class="form-control" id="criada" placeholder="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="validade">Até quando precisa ser paga?</label>
      <input name="validade" type="date" class="form-control" id="validade" placeholder="" required>
    </div>
    <div class="form-group col-md-6">
    <label for="obs">Observação</label>
    <textarea name="obs" class="form-control" id="obs" rows="2" style="resize:none" required></textarea>
    </div>
    </div>
</form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('../site/script.js') }}"></script>