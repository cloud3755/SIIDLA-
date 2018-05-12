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
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <span class="navbar-text pull-left"><img src="DSV.jpg" alt=""width="50" height="50"> </span>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    @if(Route::currentRouteName()!='login')
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li> <a class="navbar-brand" href="{{ url('/entradas') }}">
                            Entradas
                            </a>
                        </li>
                        <li>
                          <a class="navbar-brand" href="{{ url('/salidas') }}">
                              Salidas
                          </a>
                        </li>
                        @if(Auth::user()->isAdmin())
                         <li>
                          <a class="navbar-brand" href="{{ url('/numerosParte') }}">
                              Numeros de parte
                          </a>
                        </li>
                        <li>
                          <a class="navbar-brand" href="{{ url('/unidadMedida') }}">
                              Unidades de medida
                          </a>
                        </li>
                        <li>
                          <a class="navbar-brand" href="{{ url('/entradas/show') }}">
                              Historial de entradas
                          </a>
                        </li>
                        <li>
                          <a class="navbar-brand" href="{{ url('/salidas/show') }}">
                              Historial de salidas
                          </a>
                        </li>
                        @endif
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                            @if(Route::currentRouteName()=='login' || Route::currentRouteName()=="")
                            <li><a href="{{ route('login') }}">Login</a></li>

                            @else
                            <li><a href="{{ route('login') }}">Logout</a></li>
                            @endif
                        @else
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    @section('mensajesBackEnd')
        @if(Session::has('Guardado'))
            <div class="alert alert-success"><span></span><em> {!! session('Guardado') !!}</em></div>
        @endif
    @show

    @yield('content')
    
    </div>

    @section('scripts')
    <script src="{{ asset('js/bootstrap/popper.js') }}"></script>

    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    @show
    @section('scriptsSelect')
    <!--Script select 2 -->
        <script src="{{ asset('js//bootstrap/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('js//bootstrap/bootstrap-select.js') }}"></script>
    <!--  -->
    @show

    
    
    @section('scriptsDataTable')
    <!--Datatables, nesesario ponerlas en ese orden, -->
    <script src="{{ asset('js//bootstrap/datatables.js') }}"></script>
    <script src="{{ asset('js/utils/datatable.js') }}"></script>
    <!--  -->
    @show
</body>
</html>
