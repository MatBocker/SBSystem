@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Editar Aluno</title>
<style>
.botoes
{
  margin-bottom: 20px;
}

table select {
    font-family: "ProximaNova",Helvetica,Arial,Verdana,sans-serif;
    height: 26px;
    line-height: normal;
    margin-bottom: 0;
    padding: 3px;
}

table th {
    font-family: "ProximaNovaSemibold" ,Helvetica,Arial,Verdana,sans-serif;
    font-size: 13px;
    font-weight: normal;
    padding: 0px 6px 6px 12px;
    text-align: left;
    width: 20%;
}

table td {
    color: #333333;
    font-size: 13px;
    padding: 6px;
    text-align: left;
}

.checkbox-group {
}
.checkbox-group ul {
    border-radius: 4px;
    display: inline-block;
    margin-bottom: 0;
    margin-left: 0;
}
.checkbox-group ul > li {
    display: inline;
}
.checkbox-group input {
    float: left;
}
.checkbox-group input {
    display: none;
}
.checkbox-group ul > li > label {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: rgba(0, 0, 0, 0);
    border-color: #CCCCCC;
    border-image: none;
    border-style: solid;
    border-width: 1px 1px 1px 0;
    box-shadow: 0 5px 5px -6px rgba(0, 0, 0, 0.8) inset;
    color: #444444;
    float: left;
    font-family: helvetica;
    font-size: 12px;
    line-height: 20px;
    padding: 5px 12px 2px;
    text-decoration: none;
}
.checkbox-group ul > li:first-child > label {
    border-bottom-left-radius: 4px;
    border-left-width: 1px;
    border-top-left-radius: 4px;
}
.checkbox-group ul > li:last-child > label {
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
}
.checkbox-group ul > li > *:checked + label {
    background-color: #3399CC;
    background-image: -moz-linear-gradient(center top , rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
    color: #FFFFFF;
}
.checkbox-group ul > li > *:checked + *:hover, .checkbox-group ul > li > *:checked + label:focus {
    background-color: #3399CC;
    background-image: none;
}
.checkbox-group ul > li > label:hover, .checkbox-group ul > li > label:focus {
    background-color: #CCCCCC;
    background-image: none;
    color: #FFFFFF;
    cursor: pointer;
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
  <div class="form-group col-md-6"> 
  <label>Dias da Semana</label>
  <table>
    <tr>
	        <td>
		    <div class="checkbox-group" id="checkboxes">
                 <ul>
                 <li>
                	<input type="checkbox" id="segunda" name="segunda" {{  ($aluno->segunda == 1 ? ' checked' : '') }}/>
	                <label for="segunda">SEG</label>
                 </li>
                 <li>
                	<input type="checkbox" id="terca" name="terca" {{  ($aluno->terca == 1 ? ' checked' : '') }}/>
	                <label for="terca">TER</label>
                 </li>
                 <li>
                	<input type="checkbox" id="quarta" name="quarta" {{  ($aluno->quarta == 1 ? ' checked' : '') }}/>
	                <label for="quarta">QUA</label>
                 </li>
                 <li>
                	<input type="checkbox" id="quinta" name="quinta" {{  ($aluno->quinta == 1 ? ' checked' : '') }}/>
	                <label for="quinta">QUI</label>
                 </li>
                 <li>
                	<input type="checkbox" id="sexta" name="sexta" {{  ($aluno->sexta == 1 ? ' checked' : '') }}/>
	                <label for="sexta">SEX</label>
                 </li>
                 <li>
                	<input type="checkbox" id="sabado" name="sabado" {{  ($aluno->sabado == 1 ? ' checked' : '') }}/>
	                <label for="sabado">SAB</label>
                 </li>
                 <li>
                	<input type="checkbox" id="domingo" name="domingo" {{  ($aluno->domingo == 1 ? ' checked' : '') }}/>
	                <label for="domingo">DOM</label>
                 </li>
                 </ul>				
          </div>
			</td>
		</tr>

</table>
</div>
</form>


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>