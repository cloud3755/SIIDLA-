@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">ID</label>
                            <div class="input-group-addon">ID</div>
                            <input disabled type="text" value="{{$salidaMaster->id}}" /> 
                          </div>

                        </div>
                        
                        <div class="col-md-3">

                          <div class="input-group">

                     
                            <div class="input-group-addon">Fecha salida</div>
                            <input disabled type="text" value="{{$salidaMaster->fecha_Salida}}" /> 
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">Usuario</label>
                            <div class="input-group-addon">usuario</div>
                            <input disabled type="text" value="{{$salidaMaster->usuario}}" /> 
                          </div>

                        </div>

                        

                      </div>
                    </div>
                </div>  
                <div class="panel panel-default">
                <div class="panel-heading">Detalle de la salida {{$salidaMaster->id}}</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <div class="table-responsive">
                    
                      <table class="table" id="tableSalida">
                        <thead>
                          <tr>
                            <th>gin</th>
                            <th>lote</th>
                            <th>ubicacion</th>
                            <th>cantidad</th>
                            <th>Fecha de caducidad</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($salidaDetalle as $detalle)
                        <tr>
                          <td>{{$detalle->gin}}</td>
                          <td>{{$detalle->lote}}</td>
                          <td>{{$detalle->ubicacion}}</td>
                          <td>{{$detalle->cantidad}}</td>
                          <td>{{$detalle->fecha_caducidad}}</td>
                          <td><a href="{{route('showEntradasDetalle', ['id' => $detalle->id_entrada_relacionada])}}">Entrada</a></td>

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
