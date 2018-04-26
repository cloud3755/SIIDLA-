@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- aqui va la informacion que se va a cargar a la tabla de salidas -->
            <div class="panel panel-default">
                <div class="panel-heading">Salidas</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <div class="table-responsive">
                      <table class="table" id="tablesalida">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Fecha de salida</th>
                            <th>Usuario</th>
                            <th>Detalle</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($salidas as $salida)
                        <tr>
                            <td>{{$salida->id}}</td>
                            <td>{{$salida->fecha_Salida}}</td>
                            <td>{{$salida->usuario}}</td>
                            <td><a href="{{route('showSalidasDetalle', ['id' => $salida->id])}}">Detalle</a></td>
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
