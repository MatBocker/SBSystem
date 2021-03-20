@extends('layouts.sidebar')
@section('tudo')

<head>
<title>Home</title>
<style>

.card {
  border-radius: 12px;
  box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.15);
  background-color: #FFFFFF;
  color: #252422;
  margin-bottom: 20px;
  position: relative;
  border: 0 none;
  transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease; }
  .card .card-body {
    padding: 15px 15px 10px 15px; }
    .card .card-body.table-full-width {
      padding-left: 0;
      padding-right: 0; }
  .card .card-header {
    padding: 15px 15px 0;
    border: 0; }
    .card .card-header:not([data-background-color]) {
      background-color: transparent; }
    .card .card-header .card-title {
      margin-top: 10px; }
  .card .map {
    border-radius: 3px; }
    .card .map.map-big {
      height: 500px; }
  .card[data-background-color="orange"] {
    background-color: #51cbce; }
    .card[data-background-color="orange"] .card-header {
      background-color: #51cbce; }
    .card[data-background-color="orange"] .card-footer .stats {
      color: #FFFFFF; }
  .card[data-background-color="red"] {
    background-color: #ef8157; }
  .card[data-background-color="yellow"] {
    background-color: #fbc658; }
  .card[data-background-color="blue"] {
    background-color: #51bcda; }
  .card[data-background-color="green"] {
    background-color: #6bd098; }
  .card .image {
    overflow: hidden;
    height: 200px;
    position: relative; }
  .card .avatar {
    width: 30px;
    height: 30px;
    overflow: hidden;
    border-radius: 50%;
    margin-bottom: 15px; }
  .card .numbers {
    font-size: 2em; }
  .card .big-title {
    font-size: 12px;
    text-align: center;
    font-weight: 500;
    padding-bottom: 15px; }
  .card label {
    font-size: 0.8571em;
    margin-bottom: 5px;
    color: #9A9A9A; }
  .card .card-footer {
    background-color: transparent;
    border: 0; }
    .card .card-footer .stats i {
      margin-right: 5px;
      position: relative;
      top: 0px;
      color: #66615B; }
    .card .card-footer .btn {
      margin: 0; }
  .card.card-plain {
    background-color: transparent;
    box-shadow: none;
    border-radius: 0; }
    .card.card-plain .card-body {
      padding-left: 5px;
      padding-right: 5px; }
    .card.card-plain img {
      border-radius: 12px; }

.card-plain {
  background: transparent;
  box-shadow: none; }
  .card-plain .card-header,
  .card-plain .card-footer {
    margin-left: 0;
    margin-right: 0;
    background-color: transparent; }
  .card-plain:not(.card-subcategories).card-body {
    padding-left: 0;
    padding-right: 0; }

.card-chart .card-header .card-title {
  margin-top: 10px;
  margin-bottom: 0; }

.card-chart .card-header .card-category {
  margin-bottom: 5px; }

.card-chart .table {
  margin-bottom: 0; }
  .card-chart .table td {
    border-top: none;
    border-bottom: 1px solid #e9ecef; }

.card-chart .card-progress {
  margin-top: 30px; }

.card-chart .chart-area {
  height: 190px;
  width: calc(100% + 30px);
  margin-left: -15px;
  margin-right: -15px; }

.card-chart .card-footer {
  margin-top: 15px; }
  .card-chart .card-footer .stats {
    color: #9A9A9A; }

.card-chart .dropdown {
  position: absolute;
  right: 20px;
  top: 20px; }
  .card-chart .dropdown .btn {
    margin: 0; }

.card-user .image {
  height: 130px; }
  .card-user .image img {
    border-radius: 12px; }

.card-user .author {
  text-align: center;
  text-transform: none;
  margin-top: -77px; }
  .card-user .author a + p.description {
    margin-top: -7px; }

.card-user .avatar {
  width: 124px;
  height: 124px;
  border: 1px solid #FFFFFF;
  position: relative; }

.card-user .card-body {
  min-height: 240px; }

.card-user hr {
  margin: 5px 15px 15px; }

.card-user .card-body + .card-footer {
  padding-top: 0; }

.card-user .card-footer h5 {
  font-size: 1.25em;
  margin-bottom: 0; }

.card-user .button-container {
  margin-bottom: 6px;
  text-align: center; }

.map {
  height: 500px; }

.card-stats .card-body {
  padding: 15px 15px 0px; }
  .card-stats .card-body .numbers {
    text-align: right;
    font-size: 2em; }
    .card-stats .card-body .numbers p {
      margin-bottom: 0; }
    .card-stats .card-body .numbers .card-category {
      color: #9A9A9A;
      font-size: 16px;
      line-height: 1.4em; }

.card-stats .card-footer {
  padding: 0px 15px 15px; }
  .card-stats .card-footer .stats {
    color: #9A9A9A; }
  .card-stats .card-footer hr {
    margin-top: 10px;
    margin-bottom: 15px; }

.card-stats .icon-big {
  font-size: 3em;
  min-height: 64px; }
  .card-stats .icon-big i {
    line-height: 59px; }
    .card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.aluno {
    font-size: 25px;
    color:#008B8B;
}

.despesa {
    font-size: 25px;
    color:#85bb65;
}

.func {
    font-size: 25px;
    color:#FFA500;
}

.plan {
    font-size: 25px;
    color:#FFD700;
}

body
{
    background-color: #F5F5F5;
}

table {
   border: 1px solid #999;
   border-collapse: collapse;
   font-family: Georgia, Times, serif;
   }
   th {
   border: 1px solid #999;
   font-size: 70%;
   text-transform: uppercase;
   }
   td {
   border: 1px solid #999;
   height: 5em;
   width:5em;
   padding: 5px;
   vertical-align: top;
   }
</style>
</head>
<div class="container">
        <div class="row">
        <a href="{{route('alunos.index')}}">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Alunos Ativos</p>
                      <p class="card-title">{{$alunos->count()}}<p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats text-center">
                <span class="glyphicon glyphicon-user aluno" aria-hidden="true"></span>
                </div>
              </div>
            </div>
          </div>
          </a>
          <a href="{{route('despesas.index')}}">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Valor das despesas</p>
                      <p class="card-title">R$ {{$despesas->sum('valor')}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats text-center">
                <span class="glyphicon glyphicon-usd despesa" aria-hidden="true"></span>
              </div>
            </div>
          </div>
          </div>
          </a>
          <a href="{{route('funcionarios.index')}}">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Salarios</p>
                      <p class="card-title">R$ {{$funcs->sum('salario')}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats text-center">
                <span class="glyphicon glyphicon-wrench func" aria-hidden="true"></span>
              </div>
            </div>
          </div>
          </div>
          </a>
          <a href="{{route('planos.index')}}">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Planos Usados</p>
                      <p class="card-title">{{$planos}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats text-center">
                <span class="glyphicon glyphicon-file plan" aria-hidden="true"></span>
              </div>
            </div>
          </div>
          </div>
          </a>
          <table class="table text-center table-bordered table-responsive-md ">
  <thead class="text-center">
    <tr>
      <th scope="col" class="text-center">Segunda</th>
      <th scope="col" class="text-center">Terça</th>
      <th scope="col" class="text-center">Quarta</th>
      <th scope="col" class="text-center">Quinta</th>
      <th scope="col" class="text-center">Sexta</th>
      <th scope="col" class="text-center">Sabado</th>
      <th scope="col" class="text-center">Domingo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td>
    @foreach($segunda as $seg)
      <a href="{{route('alunos.show',$seg->id)}}">{{$seg->nome}}</a><br>
      @endforeach
      </td>
      <td>
    @foreach($terca as $tec)
      <a href="{{route('alunos.show',$tec->id)}}">{{$tec->nome}}</a><br>
      @endforeach
      </td>
      <td>
    @foreach($quarta as $qua)
      <a href="{{route('alunos.show',$qua->id)}}">{{$qua->nome}}</a><br>
      @endforeach
      </td>
      <td>
      @foreach($quinta as $qui)
      <a href="{{route('alunos.show',$qui->id)}}">{{$qui->nome}}</a><br>
      @endforeach
      </td>
      <td>
      @foreach($sexta as $sex)
      <a href="{{route('alunos.show',$sex->id)}}">{{$sex->nome}}</a><br>
      @endforeach
      </td>
      <td>
      @foreach($sabado as $sab)
      <a href="{{route('alunos.show',$sab->id)}}">{{$sab->nome}}</a><br>
      @endforeach
      </td>
      <td>
      @foreach($domingo as $dog)
      <a href="{{route('alunos.show',$dog->id)}}">{{$dog->nome}}</a><br>
      @endforeach
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>

@endsection