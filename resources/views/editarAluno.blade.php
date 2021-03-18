@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Editar Aluno</title>
<style>
.botoes
{
  margin-bottom: 20px;
}
</style>
</head>
<link rel="stylesheet" href="../../site/style.css">
<h1 class="text-center"> Editar {{ $aluno->nome }} </h1> <hr>
<div class="container"> 
<div class="text-center botoes">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-primary" form="editarAluno">Editar</button>
</div>
<form action="{{route('alunos.update',$aluno->id)}}" method="POST" id="editarAluno">
@method('PUT')
@CSRF
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input name="nome" type="text" class="form-control" id="nome" value="{{ $aluno->nome }}" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="rg">RG</label>
      <input name="rg" type="text" class="form-control" id="rg" value="{{ $aluno->rg }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="cpf">CPF</label>
      <input name="cpf" type="text" class="form-control" id="cpf" value="{{ $aluno->cpf }}" required>
    </div>
  </div>
  <div class="form-group col-md-4">
      <label for="telefone">Telefone</label>
      <input name="telefone" type="text" class="form-control" id="telefone" value="{{ $aluno->telefone }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="email">Email</label>
      <input name="email" type="email" class="form-control" id="email" value="{{ $aluno->email }}" required>
    </div>
  <div class="form-group col-md-2">
      <label for="data">Data de Nascimento</label>
      <input name="data" type="date" class="form-control" id="data" value="{{ $aluno->nascimento }}" required>
    </div>
    <div class="form-group col-md-2">
      <label for="sexo">Sexo</label>
      <select name="sexo" id="sexo" class="form-control" required>
      
        <option value="{{ $aluno->sexo }}" selected>{{ $aluno->sexo }}</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        </select>
    </div>
    <div class="form-group col-md-3">
      <label for="estado">UF</label>
      <select name="estado" id="estado" class="form-control"  required>
        <option value="{{ $aluno->estado }}" selected>{{ $aluno->estado }}</option>
        <option>Acre</option>
	    <option>Alagoas</option>
	    <option>Amapá</option>
	    <option>Amazonas</option>
	    <option>Bahia</option>
	    <option>Ceará</option>
	    <option>Distrito Federal</option>
	    <option>Espírito Santo</option>
	    <option>Goiás</option>
	    <option>Maranhão</option>
	    <option>Mato Grosso</option>
	    <option>Mato Grosso do Sul</option>
	    <option>Minas Gerais</option>
	    <option>Pará</option>
	    <option>Paraíba</option>
	    <option>Paraná</option>
	    <option>Pernambuco</option>
	    <option>Piauí</option>
	    <option>Rio de Janeiro</option>
	    <option>Rio Grande do Norte</option>
	    <option>Rio Grande do Sul</option>
	    <option>Rondônia</option>
	    <option>Roraima</option>
	    <option>Santa Catarina</option>
	    <option>São Paulo</option>
	    <option>Sergipe</option>
	    <option>Tocantins</option>
        </select>
    </div>
    <div class="form-group col-md-4">
      <label for="cidade">Cidade</label>
      <input name="cidade" type="text" class="form-control" id="cidade" value="{{ $aluno->cidade }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="cep">Cep</label>
      <input name="cep" type="text" class="form-control" id="cep" value="{{ $aluno->cep }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="endereco">Endereço</label>
      <input name="endereco" type="text" class="form-control" id="endereco" value="{{ $aluno->endereco }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="complemento">Complemento</label>
      <input name="complemento" type="text" class="form-control" id="complemento" value="{{ $aluno->complemento }}" required>
    </div>
    <div class="form-group col-md-2">
      <label for="treino">Treinos</label>
      <select name="treino" id="treino" class="form-control" required>
      <option value="{{ $aluno->treino->id }}" selected>{{ $aluno->treino->titulo }}</option>
        @foreach($treinos AS $treino)
      <option value="{{ $treino->id }}">{{ $treino->titulo }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
      <label for="plano">Planos</label>
      <select name="plano" id="plano" class="form-control" required>
      <option value="{{ $aluno->plano->id }}" selected>{{ $aluno->plano->nome }}</option>
        @foreach($planos AS $plano)
      <option value="{{ $plano->id }}">{{ $plano->nome }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
    <label for="obs">Observação</label>
    <textarea name="obs" class="form-control" id="obs" rows="2" style="resize:none">{{ $aluno->obs }}</textarea>
  </div>
</form>


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>