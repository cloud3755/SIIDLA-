<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @section('styles')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/Personalizados.css">

    @show
</head>
<body>

        <nav class="navbar navbar-inverse">

          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">SIIDLA</a>
            </div>

            <ul class="nav navbar-nav">
                @auth
                <li class="active">
                  <a class="navbar-brand" href="{{ url('/entradas') }}">
                    Entradas
                    </a>
                </li>

                <li>
                  <a class="navbar-brand" href="{{ url('/salidas') }}"> Salidas</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Numeros de parte
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="navbar-brand" href="{{ url('/numerosParte') }}">Numeros de parte</a></li>
                    <li><a class="navbar-brand" href="{{ url('/unidadMedida') }}">Unidades de medida</a></li>
                    <li><a class="navbar-brand" href="{{ url('/ubicaciones') }}">ubicaciones</a></li>
                    <li><a class="navbar-brand" href="{{ url('/numerosParte/CambioArea') }}">Cambio de area</a></li>
                </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Historial
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="navbar-brand" href="{{ url('/entradas/show') }}">Historial de entradas</a></li>
                    <li><a class="navbar-brand" href="{{ url('/salidas/show') }}">Historial de salidas</a></li>
                    <li><a class="navbar-brand" href="{{ url('/numerosParte/CambioArea/historial/resumen') }}">Historial de movimientos de area</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">PDO
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="navbar-brand" href="{{ url('/cargar/pdo') }}">Subir pdo</a></li>
                      @if(Auth::user()->isAdmin())
                      <li><a class="navbar-brand" href="{{ url('/historial/pdo') }}">Historial pdo</a></li>
                          @endif
                  </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            @if(Auth::user()->isAdmin())
                            <a href="{{ route('register') }}">Registrar usuarios</a>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>




          </div>

        </nav>
    @section('mensajesBackEnd')
        @if(Session::has('Guardado'))
            <div class="alert alert-success"><span></span><em> {!! session('Guardado') !!}</em></div>
        @endif
        @if(Session::has('Warning'))
            <div class="alert alert-warning"><span></span><em> {!! session('Warning') !!}</em></div>
        @endif
    @show

    @yield('content')

    </div>

    @section('scripts')
    <script src="{{ asset('js/bootstrap/popper.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <!--Datatables, nesesario ponerlas en ese orden, -->
    <script src="{{ asset('js//bootstrap/datatables.js') }}"></script>
    <script src="{{ asset('js/utils/datatable.js') }}"></script>
    <!--  -->
    @show

    @section('scriptsDataTable')
    
    @show

    @section('scriptsSelect')
    <!--Script select 2 -->
        <script src="{{ asset('js//bootstrap/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('js//bootstrap/bootstrap-select.js') }}"></script>
    <!--  -->
    @show



    
</body>
</html>
