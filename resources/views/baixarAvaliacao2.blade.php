<!DOCTYPE html>
<head>
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
	color: black; 
	font-weight: bold; 
    font-size: 18px;
	}
    td
    {
        font-size: 15px;
        border: 1px solid #ccc; 
    }

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	}

    .meio
    {
        color: white;
        background: #505050; 
        text-align: center;
    }
</style>
</head>
<body>
<link rel="stylesheet" href="../site/style.css">
<div class="container">
<table class="table">
  <tbody>
  <tr>
  <th colspan="2" class="meio">Dados Pessoais:</th>
  </tr>
    <tr>
      <th>Nome:</th>
      <td>{{$aluno->nome}}</td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td>{{$aluno->sexo}}</td>
    </tr>
    <tr>
      <th>Idade:</th>
      <td>{{$ava->idade}}</td>
    </tr>
    <tr>
      <th>Peso:</th>
      <td>{{$ava->peso}}</td>
    </tr>
    <tr>
      <th>Altura:</th>
      <td>{{$ava->altura}}</td>
    </tr>
    <tr>
      <th>Modalidade:</th>
      <td>{{$ava->modalidade}}</td>
    </tr>
    <tr>
      <th>Criada em:</th>
      <td>{{$ava->created_at}}</td>
    </tr>
    <tr>
  <th colspan="2" class="meio">Perimetria (cm):</th>
  </tr>
    <tr>
      <th>Tórax:</th>
      <td>{{$ava->torax}}</td>
    </tr>
    <tr>
      <th>Cintura:</th>
      <td>{{$ava->cintura}}</td>
    </tr>
    <tr>
      <th>Abdômem:</th>
      <td>{{$ava->abdomem}}</td>
    </tr>
    <tr>
      <th>Quadril:</th>
      <td>{{$ava->quadril}}</td>
    </tr>
    <tr>
      <th>Coxa:</th>
      <td>{{$ava->coxa}}</td>
    </tr>
    <tr>
      <th>Panturrilha:</th>
      <td>{{$ava->panturilha}}</td>
    </tr>
    <tr>
      <th>Braço:</th>
      <td>{{$ava->braco}}</td>
    </tr>
    <tr>
      <th>Antebraço:</th>
      <td>{{$ava->antebraco}}</td>
    </tr>
  </tr>
  </tr> 
  </tbody>
</table>
<table class="table">
  <tbody>
  <tr>
  <th colspan="2" class="meio">Plicometria (mm):</th>
  </tr>
    <tr>
      <th>Tríceps:</th>
      <td>{{$ava->triceps}}</td>
    </tr>
    <tr>
      <th>Subescapular:</th>
      <td>{{$ava->subescapular}}</td>
    </tr>
    <tr>
      <th>Axilar:</th>
      <td>{{$ava->peitoral}}</td>
    </tr>
    <tr>
      <th>Suprailíaca:</th>
      <td>{{$ava->suprailiaca}}</td>
    </tr>
    <tr>
      <th>Abdominal:</th>
      <td>{{$ava->abdominal}}</td>
    </tr>
    <tr>
      <th>Coxa:</th>
      <td>{{$ava->coxaMM}}</td>
    </tr>
    <tr>
      <th>Soma Total:</th>
      <td>{{$ava->somaMM}}</td>
    </tr>
    <tr>
  <th colspan="2" class="meio">Resultado:</th>
  </tr>
    <tr>
      <th>IMC:</th>
      <td>{{$ava->imc}}</td>
    </tr>
    <tr>
      <th>ICQ:</th>
      <td>{{$ava->icq}}</td>
    </tr>
    <tr>
      <th>% de Gordura:</th>
      <td>{{$ava->gordura}}%</td>
    </tr>
    <tr>
      <th>% de Gordura Ideal:</th>
      <td>{{$ava->gorduraIdeal}}%</td>
    </tr>
    <tr>
      <th>Massa Magra:</th>
      <td>{{$ava->massaMagra}}Kg</td>
    </tr>
    <tr>
      <th>Peso Gordura:</th>
      <td>{{$ava->pesoGordura}}Kg</td>
    </tr>
    <tr>
      <th>Peso Ideal:</th>
      <td>{{$ava->pesoIdeal}}Kg</td>
    </tr>
    <tr>
      <th>Excesso de Gordura:</th>
      <td>{{$ava->excessoGordura}}Kg</td>
    </tr>
  </tr> 
  </tbody>
</table>
</div>
</body>
</html>