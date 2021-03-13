@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Ultima Avaliação</title>
</head>
<link rel="stylesheet" href="../../site/style.css">
<h1 class="text-center"> Avaliação Física de {{$aluno->nome}} </h1> <hr>
<div class="text-center">
        <a href="{{route('alunos.ava',$aluno->id)}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
      </div>  
<div class="container">
<hr>
<h2 >Dados Pessoais:</h2><br>
<div class="h4">
<span>Matricula: {{$aluno->id}}</span><br><br>   
<span>Nome: {{$aluno->nome}}</span><br><br>
<span>Sexo: {{$aluno->sexo}}</span><br><br>
<span>Idade: {{$ava->idade}}</span><br><br> 
<span>Peso: {{$ava->peso}}</span><br><br>
<span>Altura: {{$ava->altura}}</span><br><br>
<span>Modalidade: {{$ava->modalidade}}</span><br><br>   
<span>Data: {{$ava->created_at}}</span><br><br>       
</div>
<hr>
<h2 >Perimetria (cm):</h2><br>
<div class="h4">
<span>Tórax: {{$ava->torax}}</span><br><br>
<span>Cintura: {{$ava->cintura}}</span><br><br>
<span>Abdômem: {{$ava->abdomem}}</span><br><br>
<span>Quadril: {{$ava->quadril}}</span><br><br>
<span>Coxa: {{$ava->coxa}}</span><br><br>
<span>Panturrilha: {{$ava->panturilha}}</span><br><br>
<span>Braço: {{$ava->braco}}</span><br><br>
<span>Antebraço: {{$ava->antebraco}}</span><br><br>                          
</div>
<hr>
<h2 >Plicometria (mm):</h2><br>
<div class="h4">
<span>Tríceps: {{$ava->triceps}}</span><br><br>
<span>Subescapular: {{$ava->subescapular}}</span><br><br>   
<span>Peitoral: {{$ava->peitoral}}</span><br><br>   
<span>Axilar: {{$ava->axilar}}</span><br><br>   
<span>Suprailíaca: {{$ava->suprailiaca}}</span><br><br>
<span>Abdominal: {{$ava->abdominal}}</span><br><br>
<span>Coxa: {{$ava->coxaMM}}</span><br><br>
<span>Soma Total: {{$ava->somaMM}}</span><br><br>                 
</div>
<hr>
<h2 >Resultados:</h2><br>
<div class="h4">
<span>IMC: {{$ava->imc}}</span><br><br>
<span>ICQ: {{$ava->icq}}</span><br><br>
<span>% de Gordura: {{$ava->gordura}}</span><br><br>
<span>% de Gordura Ideal: {{$ava->gorduraIdeal}}</span><br><br>  
<span>Massa Magra: {{$ava->massaMagra}}</span><br><br>
<span>Peso Gordura: {{$ava->pesoGordura}}</span><br><br> 
<span>Peso Ideal: {{$ava->pesoIdeal}}</span><br><br>
<span>Excesso de Gordura: {{$ava->excessoGordura}}</span><br><br>        
</div>
</div>



@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>