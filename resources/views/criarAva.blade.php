@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Cadastro da Avaliação Física</title>
<style>
.yeah {
  margin-top: 30px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
</head>
<link rel="stylesheet" href="../../site/style.css">
<h1 class="text-center"> Cadastrar Avaliação Física </h1> <hr>
<div class="container"> 
<div class="text-center">
        <a href="{{route('alunos.index')}}">
          <button class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success" form="criarAvali">Cadastrar</button>
</div>

<form action="{{route('alunos.avaliacaoCriar',$aluno->id)}}" method="POST" id="criarAvali">
@CSRF
@method('PUT')
<div class="form-group">
<h2 >Dados Pessoais:</h2>
  <div class="col-md-2">
      <label for="idade">Idade</label>
      <input name="idade" type="number" class="form-control" id="idade" placeholder="" required>
    </div>
    <div class="col-md-2">
      <label for="peso">Peso</label>
      <input name="peso" type="text" onkeyup="calcular_imc(); pesogordura()" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="peso" placeholder="" required>
    </div>
    
    <div class="col-md-2">
      <label for="altura">Altura</label>
      <input name="altura" type="text" onkeyup="calcular_imc()" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="altura" placeholder="" required>
    </div>
    <div class="col-md-2">
      <label for="modalidade">Modalidade</label>
      <input name="modalidade" type="text" pattern="^[a-zA-Z\u00C0-\u00FF ]*$" title="Apenas letras!" class="form-control" id="modalidade" placeholder="" required>
    </div>
    </div>
    <br><div class="form-group yeah">
    <br><h2>Perimetria (cm):</h2>
    <div class="col-md-2">
      <label for="torax">Tórax</label>
      <input name="torax" type="text"   pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="torax" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="cintura">Cintura</label>
      <input name="cintura" type="text" onkeyup="calcular_icq()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="cintura" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="abdomem">Abdômem</label>
      <input name="abdomem" type="text" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="abdomem" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="quadril">Quadril</label>
      <input name="quadril" type="text" onkeyup="calcular_icq()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="quadril" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="coxa">Coxa</label>
      <input name="coxa" type="text"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="coxa" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="pant">Panturrilha</label>
      <input name="pant" type="text"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="pant" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="braco">Braço</label>
      <input name="braco" type="text"   pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="braco" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="antebraco">Antebraço</label>
      <input name="antebraco" type="text"   pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="antebraco" placeholder="" required><br>
    </div>
    </div>.
    <div class="form-group yeah">
    <br><h2>Plicometria (mm):</h2>
    <div class="col-md-2">
      <label for="triceps">Tríceps</label>
      <input name="triceps" type="text" onkeyup="sum()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}"  title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="triceps" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="subescapular">Subescapular</label>
      <input name="subescapular" type="text" onkeyup="sum()" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!"  class="form-control" id="subescapular" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="peitoral">Peitoral</label>
      <input name="peitoral" type="text" onkeyup="sum()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="peitoral" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="axilar">Axilar</label>
      <input name="axilar" type="text" onkeyup="sum()" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="axilar" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="suprailiaca">Suprailíaca</label>
      <input name="suprailiaca" type="text"  onkeyup="sum()" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="suprailiaca" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="abdominal">Abdominal</label>
      <input name="abdominal" type="text" onkeyup="sum()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="abdominal" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="coxam">Coxa</label>
      <input name="coxam" type="text" onkeyup="sum()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}+" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="coxam" placeholder="" required><br>
    </div>
    <div class="col-md-2">
      <label for="soma">Soma Total:</label>
      <input name="soma" type="text" class="form-control" id="soma" placeholder="" readonly="readonly"><br>
    </div>
    </div>.
      <div class="form-group yeah">
    <br><h2>Resultado:</h2>
    <div class="col-md-2">
      <label for="imc">IMC</label>
      <input name="imc" type="text" class="form-control" id="imc" placeholder="" readonly="readonly"><br>
    </div>
    <div class="col-md-2">
      <label for="icq">ICQ</label>
      <input name="icq" type="text" class="form-control" id="icq" placeholder="" readonly="readonly"><br>
    </div>
    <div class="col-md-2">
      <label for="gord">% de Gordura</label>
      <input name="gord" type="text" onkeyup="pesogordura()"  pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="gord" placeholder=""><br>
    </div>
    <div class="col-md-2">
      <label for="gordideal">% de Gordura Ideal</label>
      <input name="gordideal" type="text" pattern="[^.,?//a-zA-Z][0-9]*\.?[0-9]{1,2}" title="Apenas números, um ponto , uma ou duas casas decimais!" class="form-control" id="gordideal" placeholder=""><br>
    </div>
    <div class="col-md-2">
      <label for="massa">Massa Magra</label>
      <input name="massa" type="text" class="form-control" id="massa" placeholder="" readonly="readonly"><br>
    </div>
    <div class="col-md-2">
      <label for="pesogord">Peso Gordura</label>
      <input name="pesogord" type="text" class="form-control" id="pesogord" placeholder="" readonly="readonly"><br>
    </div>
    <div class="col-md-2">
      <label for="pesoideal">Peso Ideal</label>
      <input name="pesoideal" type="text" class="form-control" id="pesoideal" placeholder="" readonly="readonly"><br>
    </div>
    <div class="col-md-2">
      <label for="exgord">Excesso de Gordura</label>
      <input name="exgord" type="text" class="form-control" id="exgord" placeholder="" readonly="readonly"><br>
    </div>
    </div>
    <input name="sexo" type="hidden" class="form-control" id="sexo" placeholder="" value="{{$aluno->sexo}}"><br>
</form>
@endsection
<<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function sum() {
            var valor1 = document.getElementById('triceps').value;
            var valor2 = document.getElementById('subescapular').value;
            var valor3 = document.getElementById('peitoral').value;
            var valor4 = document.getElementById('axilar').value;
            var valor5 = document.getElementById('suprailiaca').value;
            var valor6 = document.getElementById('abdominal').value;
            var valor7 = document.getElementById('coxam').value;
            var result = parseFloat(valor1) + parseFloat(valor2) + parseFloat(valor3) + parseFloat(valor4) + parseFloat(valor5) + parseFloat(valor6) + parseFloat(valor7);
            if (!isNaN(result)) {
                document.getElementById('soma').value = result.toFixed(1);
            }
        }

        function calcular_imc() {
            var valor1 = document.getElementById('peso').value;
            var valor2 = document.getElementById('altura').value;
            var quadrado = parseFloat(valor2) * parseFloat(valor2);
            var result = parseFloat(valor1) / parseFloat(quadrado);
            if (!isNaN(result)) {
                document.getElementById('imc').value = result.toFixed(1);
            }
            var result2 = 22.26*parseFloat(quadrado);
            if (!isNaN(result2)) {
                document.getElementById('pesoideal').value = result2.toFixed(1);
            }
            var result3 = parseFloat(valor1) - parseFloat(result2);
            if (!isNaN(result3)) {
                document.getElementById('exgord').value = result3.toFixed(1);
            }
        }
        function calcular_icq() {
            var valor1 = document.getElementById('cintura').value;
            var valor2 = document.getElementById('quadril').value;
            var result = parseFloat(valor1) / parseFloat(valor2);
            if (!isNaN(result)) {
                document.getElementById('icq').value = result.toFixed(2);
            }
        }

        function pesogordura() {
            var valor1 = document.getElementById('peso').value;
            var valor2 = document.getElementById('gord').value;
            var dividir = parseFloat(valor2)/ 100;
            var result = parseFloat(valor1) * parseFloat(dividir);
            if (!isNaN(result)) {
                document.getElementById('pesogord').value = result.toFixed(1);
            }
            var result2 = parseFloat(valor1) - parseFloat(result);
            if (!isNaN(result2)) {
                document.getElementById('massa').value = result2.toFixed(1);
            }
        }
    </script>

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('site/script.js') }}"></script>