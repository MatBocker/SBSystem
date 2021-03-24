<!DOCTYPE html>
<head>
<title>Visualizar Aluno</title>
<style>

table { 
	width: 90%; 
	border-collapse: collapse; 
	margin:10% auto;
  table-layout:fixed;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #383838; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}

  strong 
  {
    font-size: 16px;
  }

</style>
</head>
<body>
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Dados de {{$aluno->nome}} </h1> <hr> 
<div class="container">

<div class="h4">
<span><strong>Matricula:</strong> {{$aluno->id}}</span><br><br>     
<span><strong>Nome:</strong> {{$aluno->nome}}</span><br><br> 
<span><strong>RG:</strong> {{$aluno->rg}}</span><br><br> 
<span><strong>CPF:</strong> {{$aluno->cpf}}</span><br><br> 
<span><strong>Sexo:</strong> {{$aluno->sexo}}</span><br><br> 
<span><strong>Data de Nascimento:</strong> {{$aluno->nascimento}}</span><br><br> 
<span><strong>Telefone:</strong> {{$aluno->telefone}}</span><br><br> 
<span><strong>Email:</strong> {{$aluno->email}}</span><br><br> 
<span><strong>Endereço:</strong> {{$aluno->endereco}}</span><br><br> 
<span><strong>Estado:</strong> {{$aluno->estado}}</span><br><br>
<span><strong>Cidade:</strong> {{$aluno->cidade}}</span><br><br>
<span><strong>CEP:</strong> {{$aluno->cep}}</span><br><br>
<span><strong>Observação:</strong> {{$aluno->obs}}</span><br><br> 
<span><strong>Treino:</strong> {{$aluno->treino->titulo}}</span><br><br> 
<h1 class="text-center"> Dados do Plano</h1> <hr>
<span><strong>Plano:</strong> {{$aluno->plano->nome}}</span><br><br> 
<span><strong>Preço:</strong> {{$aluno->plano->preco}}</span><br><br>
<span><strong>Tipo:</strong> {{$aluno->plano->tipo}}</span><br><br>  
<span><strong>Observação:</strong> {{$aluno->plano->observacao}}</span><br><br> 
</div>
<hr>
<h2 class="text-center">Dados do Treino</h2>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Peso</th>
      <th>Repetições</th>
      <th>Series</th>
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
</body>
</html>

