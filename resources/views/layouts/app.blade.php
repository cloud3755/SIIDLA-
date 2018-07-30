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
              <a class="navbar-brand" href="/">SIIDLA</a>
            </div>

            @include("layouts.nav")

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
