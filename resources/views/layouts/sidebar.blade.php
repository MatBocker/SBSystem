<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="site/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="{{ asset('js/app.js') }}"></script>
  </head>
  <body>
<!------ Include the above in your HEAD tag ---------->

    <div id="wrapper" class="toggled">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       LOGO
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}">Visão Geral</a>
                </li>
                <li>
                    <a href="{{route('alunos.index')}}">Alunos</a>
                </li>
                <li>
                    <a href="{{route('treinos.index')}}">Treinos</a>
                </li>
                <li>
                    <a href="{{route('planos.index')}}">Planos</a>
                </li>
                <li>
                    <a href="#">Despesas</a>
                </li>
                <li>
                    <a href="#">Ganhos</a>
                </li>

                <li>
                    <a href="#">Sobre</a>
                </li>
                
                <div>
                <li>
                 <div class="dropdown">
                <a class="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{ Auth::user()->name }}
                 </a>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 {{ __('Deslogar') }}
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
                </form>
                </div>
                </div>
                </li>
    </div>
    </ul>
            
        </nav>
        
        <div id="page-content-wrapper">
            <button type="button" class="btn btn-lg custom-btn" data-toggle="offcanvas">
                <i class="fa fa-bars"></i>
            </button>
            @yield('tudo')
        </div>
        <!-- /#page-content-wrapper -->
        
    <!-- /#wrapper -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="site/script.js"></script>
  </body>
</html>
