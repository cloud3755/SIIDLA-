@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- aqui va la informacion que se va a cargar a la tabla de entradas -->
            <div class="panel panel-default">
                <div class="panel-heading">Entradas</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <div class="table-responsive">
                      <table class="table" id="tableEntrada">
                        <thead>
                          <tr>
                            <th>ENTRADA</th>
                            <th>Fecha de entrada</th>
                            <th>Usuario</th>
                            <th>sucursal</th>
                            <th>Detalle</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($entradas as $entrada)
                        <tr>
                            <td>{{$entrada->id}}</td>
                            <td>{{$entrada->fecha_entrada}}</td>
                            <td>{{$entrada->usuario}}</td>
                            <td>{{$entrada->sucursal}}</td>
                            <td><a href="{{route('showEntradasDetalle', ['id' => $entrada->id])}}">Detalle</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
  @parent
  <script src="{{ asset('js/app.js') }}"></script>

  @endsection
@endsection
