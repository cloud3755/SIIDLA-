


<ul class="nav navbar-nav">
    
@auth
@if(Auth::user()->id_rol == 4)
    <li>
    <a class="navbar-brand" data-toggle="dropdown" href="/historial/pdo">PDO
    </li>
@else

<li class="active">
    <a class="navbar-brand" href="{{ url('/entradas') }}">
    Entradas
    </a>
</li>

<li>
    <a class="navbar-brand" href="{{ url('/salidas') }}"> Salidas</a>
</li>
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
@endif
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