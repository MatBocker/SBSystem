@extends('layouts.sidebar')
@section('tudo')
<head>
<title>Cadastro do Treino</title>
</head>
<link rel="stylesheet" href="../site/style.css">
<h1 class="text-center"> Cadastrar Treino </h1> <hr>


<div class="container"> 
<form action="{{route('treinos.store')}}" method="POST">
@CSRF
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="titulo">Titulo</label>
      <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Nome" required>
    </div>
    <div class="form-group col-md-6">
    <label for="obs">Observação</label>
    <textarea name="obs" class="form-control" id="obs" rows="2"></textarea>
    </div>
    <div class="text-center">
<button type="submit" class="btn btn-success">Cadastrar</button>
    </div>

</div>
<div class="panel panel-footer"> 
<table class="table table-bordered" id="dynamic_field">
<thead>
<tr>
<th>Nome</th>
<th>Peso</th>
<th>Repetições</th>
<th>Series</th>
<th><a href="#" class="btn btn-info addRow">+</a></th>
</tr>
</thead>
<tbody>
<tr>
<td><input name="nome[]" type="text" class="form-control" required></td>
<td><input name="peso[]" type="text" class="form-control" required></td>
<td><input name="repeticoes[]" type="text" class="form-control" required></td>
<td><input name="series[]" type="text" class="form-control" required></td>
<td><a href="#" class="btn btn-danger remove">-</a></td>
</tr>
</tbody>
</table>
</div>
</form>


<script>

$('.addRow').on('click', function(){
  addRow();
});

function addRow()
{
  var tr = '<tr>'+ '<td>'+'<input name="nome[]" type="text" class="form-control" required></td>'
  +'<td><input name="peso[]" type="text" class="form-control" required></td>'
  +'<td><input name="repeticoes[]" type="text" class="form-control" required></td>'
  +'<td><input name="series[]" type="text" class="form-control" required></td>'
  +'<td><a href="#" class="btn btn-danger remove">-</a></td>'+
  '</tr>';
  $('tbody').append(tr);
};
$('tbody').on('click','.remove',function()
{
  $(this).parent().parent().remove();
});
 </script>
 
 @endsection