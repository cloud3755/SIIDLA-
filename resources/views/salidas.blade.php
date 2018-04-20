@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--<div class="col-md-12 col-md-offset-1">-->
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Capturar salida</div>

                    <div class="panel-body">
                        <!-- @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif -->
                        @section('mensajesBackEnd')
                        @parent
                        @endsection
                        <form class="form" >
                        
                        
                        <div class="text-center">
                            <button type="button" id="ProcesarSalida" class="btn btn-primary">SALIDA</button>
                            <button class="btn btn-danger">Limpiar datos</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-md-offset-1">
            <!-- aqui va la informacion que se va a cargar a la tabla de entradas -->
                <div class="panel panel-default">
                    <div class="panel-heading">Salidas</div>

                    <div class="panel-body">
                        <!-- @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif -->
                        <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th>LOTE</th>
                            <th>UBICACION</th>
                            <th>FECHA de caducidad</th>
                            <th>APLICAR</th>
                            <th>CANTIDAD A DAR SALIDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventario as $record)
                            <tr class="salidaRow" id="{{$record->id}}">
                                <td>{{$record->gin}}</td>
                                <td>{{$record->Descripcion}}</td>
                                <td>{{$record->cantidad}}</td>
                                <td>{{$record->lote}}</td>
                                <td>{{$record->ubicacion}}</td>
                                <td>{{$record->fecha_caducidad}}</td>
                                <td><input class="chkAplicar" type="checkbox"></td>
                                <td><input class="Cantidad" type="number" max="{{$record->cantidad}}" min="1" value="{{$record->cantidad}}" /></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <form hidden id="form" method="POST" action="/salidas" }}>
                {{ csrf_field() }}
                <input type="text" id="datosSalida" name="datosSalida" /> 
            </form>
        <!--</div>-->
    </div>
</div>
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('js/app.js') }}"></script>
 
  <script src="{{ asset('js/salidas/appSalidas.js') }}"></script>
  <script src="{{ asset('js//bootstrap/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('js//bootstrap/bootstrap-select.js') }}"></script>
  
  @endsection
