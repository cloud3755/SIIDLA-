@extends('layouts.app')

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
                        <table class="table">
                        <thead>
                            <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>SUCURSAL</th>
                            <th>APLICAR</th>
                            <th>UBICACION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventario as $record)
                            <tr class="salidaRow" data-idSucursal="{{$record->id_sucursal}}" data-idEntrada="{{$record->id_entrada}}" id="{{$record->id}}">
                                <td class="gin">{{$record->gin}}</td>
                                <td class="descripcion">{{$record->Descripcion}}</td>
                                <td  class="sucursal">{{$record->nombre_sucursal}}</td>
                                <td><input class="chkAplicar" type="checkbox"></td>
                                <td>
                                <select class="form-control areaSelect" data-area="{{$record->ubicacion}}">
                                    
                                </select>
                                </td>
                            </tr>
                            @endforeach
                        <div id="areaTemplate" hidden>
                            <option value="0">Seleccione...</option>
                            @foreach($ubicaciones as $ubicacion)
                                <option value="{{$ubicacion->Ubicacion}}">{{$ubicacion->Ubicacion}}</option>
                            @endforeach
                        </div>
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

  @endsection
