@extends('layouts.app')
@section('styles')
@parent
  <link href="{{ asset('css/bootstrap/bootstrap-select.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap/bootstrap-select.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap/bootstrap-select.css.map') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <!--<div class="col-md-12 col-md-offset-1">-->
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Cambio de area</div>

                    <div class="panel-body">
                        <!-- @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif -->
                        @section('mensajesBackEnd')
                        @parent
                        @endsection            
                        <div class="text-center">
                            <button type="button" id="ProcesarSalida" class="btn btn-primary">Procesar</button>                            
                        </div>
                       

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Partes</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table" id="dataTable">
                        <thead>
                            <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>AREA</th>
                            <th>SUCURSAL</th>
                            <th>CANTIDAD ACTUAL</th>
                            <th>APLICAR</th>
                            <th>CANTIDAD</th>
                            <th>NUEVA UBICACION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventario as $record)
                            <tr class="cambioAreaRow" data-idSucursal="{{$record->id_sucursal}}" data-idEntrada="{{$record->id_entrada}}" id="{{$record->id}}">
                                <td class="gin">{{$record->gin}}</td>
                                <td class="descripcion">{{$record->Descripcion}}</td>
                                <td >{{$record->ubicacion}}</td>
                                <td  class="sucursal">{{$record->nombre_sucursal}}</td>
                                <td  >{{$record->cantidad}}</td>
                                <td><input class="chkAplicar" type="checkbox"></td>
                                <td><input class="cantidad overCero" type="number" min="1" max="{{$record->cantidad}}"></td>
                                <td>
                                <select class="form-control areaSelect" data-area="{{$record->ubicacion}}" data-live-search="true" data-width="100%">
                        
                                </select>
                                <input hidden class="areaAnterior" type="text" value="{{$record->ubicacion}}">
                                <input hidden class="lote" type="text" value="{{$record->lote}}">
                                <input hidden class="fecha_caducidad" type="text" value="{{$record->fecha_caducidad}}">
                                <input hidden class="fechaHora_entrada" type="text" value="{{$record->fechaHora_entrada}}">
                                <input hidden class="sucursalId" type="text" value="{{$record->id_sucursal}}">
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                        </table>
                        <div id="areaTemplate" hidden>
                            <option value="0">Seleccione...</option>
                            @foreach($ubicaciones as $ubicacion)
                            <option value="{{$ubicacion->ubicacion}}">{{$ubicacion->ubicacion}}</option>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <form hidden id="form" method="POST" action="/numerosParte/CambioArea">
            {{ csrf_field() }}
            <input type="text" id="datosCambioArea" name="datosCambioArea" /> 
            </form>
        <!--</div>-->
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('js/utils/inputNumberUtil.js') }}"></script>
<script src="{{ asset('js/numerosParte/cambioAreaApp.js') }}"></script>
@endsection
