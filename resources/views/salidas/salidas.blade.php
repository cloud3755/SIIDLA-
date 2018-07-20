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
                            <button type="button" id="MostrarCheck" class="btn btn-primary" data-toggle="modal" data-target="#ModalCheckList">Check list</button>
                            
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
                        <table class="table" id="dataTable">
                        <thead>
                            <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th>LOTE</th>
                            <th>UBICACION</th>
                            <th>FECHA de caducidad</th>
                            <th>SUCURSAL</th>
                            <th>APLICAR</th>
                            <th>CANTIDAD A DAR SALIDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventario as $record)
                            <tr class="salidaRow" data-idSucursal="{{$record->id_sucursal}}" data-idEntrada="{{$record->id_entrada}}" id="{{$record->id}}">
                                <td class="gin">{{$record->gin}}</td>
                                <td class="descripcion">{{$record->Descripcion}}</td>
                                <td>{{$record->cantidad}}</td>
                                <td class="lote">{{$record->lote}}</td>
                                <td class="ubicacion">{{$record->ubicacion}}</td>
                                <td class="fecha_caducidad" >{{$record->fecha_caducidad}}</td>
                                <td  class="sucursal">{{$record->nombre_sucursal}}</td>
                                <td><input class="chkAplicar" type="checkbox"></td>
                                <td><input class="Cantidad overCero" type="number" max="{{$record->cantidad}}" min="1" value="{{$record->cantidad}}" /></td>
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

<!-- Modal Check List-->
<div class="modal fade" id="ModalCheckList" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="checkListPrintArea">
            <div hidden id="topCheckListTable">
            <table>
                <tr>
                    <th class="checkListTitle">Autorizaciones</th>
                </tr>
                <tr>
                    <td>
                        <div>
                        <table>
                            <tr><td>CIA</td></tr>
                            <tr><td>MARCA</td></tr>
                            <tr><td>MODELO</td></tr>
                            <tr><td>PLACAS</td></tr>
                        </table>
                        </div>
                    </td>
                    <td>
                        <div>
                        <table>
                        <tr><td>Firma del chofer</td></tr>
                        <tr><td>_______________________</td></tr>
                        </table>
                        </div>
                    </td>
                    <td>
                        <div>
                        <table>
                            <tr><td>Folio</td></tr>
                            <tr><td>Cliente</td></tr>
                            <tr><td>Producto</td></tr>
                            <tr><td>Fecha de revisión</td></tr>
                        </table>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
            <table class="table checkList">
                <tr>
                    <th class="checkListTitle" colspan="3">Revisión de equipo de protección personal</th>
                </tr>
                <tr>
                    <th>Dato</th>
                    <th>Cumple</th>
                    <th>no cumple</th>
                </tr>
                <tr>
                    <td>FAJA</td>
                    <td><input name="Faja" type="radio"></td>
                    <td><input name="Faja" type="radio"></td>
                </tr>
                <tr>
                    <td>Zapatos de Seguridad</td>
                    <td><input name="Zapatos" type="radio"></td>
                    <td><input name="Zapatos" type="radio"></td>
                </tr>
            </table>
            <br>
            <table class="table checkList">
                <tr>
                    <th class="checkListTitle" colspan="4">Condiciones de la estructura</th>
                </tr>
                <tr>
                    <th>Dato</th>
                    <th>Bien</th>
                    <th>Regular</th>
                    <th>Mal</th>
                </tr>
                <tr>
                    <td>Paredes</td>
                    <td><input name="Paredes" type="radio"></td>
                    <td><input name="Paredes" type="radio"></td>
                    <td><input name="Paredes" type="radio"></td>
                </tr>
                <tr>
                    <td>Piso</td>
                    <td><input name="Piso" type="radio"></td>
                    <td><input name="Piso" type="radio"></td>
                    <td><input name="Piso" type="radio"></td>
                </tr>
                <tr>
                    <td>Techo</td>
                    <td><input name="Techo" type="radio"></td>
                    <td><input name="Techo" type="radio"></td>
                    <td><input name="Techo" type="radio"></td>
                </tr>
                <tr>
                    <td>Puertas</td>
                    <td><input name="Puertas" type="radio"></td>
                    <td><input name="Puertas" type="radio"></td>
                    <td><input name="Puertas" type="radio"></td>
                </tr>
                <tr>
                    <td>Cierre hermetico</td>
                    <td><input name="hermetico" type="radio"></td>
                    <td><input name="hermetico" type="radio"></td>
                    <td><input name="hermetico" type="radio"></td>
                </tr>
            </table>
            <br>
            <table class="table checkList">
                <tr>
                    <th class="checkListTitle" colspan="4">Condiciones de limpieza</th>
                </tr>
                <tr>
                    <th>Dato</th>
                    <th>Bien</th>
                    <th>Regular</th>
                    <th>Mal</th>
                </tr>
                <tr>
                    <td>Paredes</td>
                    <td><input name="Paredes1" type="radio"></td>
                    <td><input name="Paredes1" type="radio"></td>
                    <td><input name="Paredes1" type="radio"></td>
                </tr>
                <tr>
                    <td>Piso</td>
                    <td><input name="Piso1" type="radio"></td>
                    <td><input name="Piso1" type="radio"></td>
                    <td><input name="Piso1" type="radio"></td>
                </tr>
                <tr>
                    <td>Techo</td>
                    <td><input name="Techo1" type="radio"></td>
                    <td><input name="Techo1" type="radio"></td>
                    <td><input name="Techo1" type="radio"></td>
                </tr>
                <tr>
                    <td>Puertas</td>
                    <td><input name="Puertas1" type="radio"></td>
                    <td><input name="Puertas1" type="radio"></td>
                    <td><input name="Puertas1" type="radio"></td>
                </tr>
            </table>
            <br>
            <table class="table checkList">
                <tr>
                    <th class="checkListTitle" colspan="4">Olores extraños</th>
                </tr>
                <tr>
                    <th>Dato</th>
                    <th>Bien</th>
                    <th>Regular</th>
                    <th>Mal</th>
                </tr>
                <tr>
                    <td>Paredes</td>
                    <td><input name="Paredes2" type="radio"></td>
                    <td><input name="Paredes2" type="radio"></td>
                    <td><input name="Paredes2" type="radio"></td>
                </tr>
                <tr>
                    <td>Piso</td>
                    <td><input name="Piso2" type="radio"></td>
                    <td><input name="Piso2" type="radio"></td>
                    <td><input name="Piso2" type="radio"></td>
                </tr>
                <tr>
                    <td>Techo</td>
                    <td><input name="Techo2" type="radio"></td>
                    <td><input name="Techo2" type="radio"></td>
                    <td><input name="Techo2" type="radio"></td>
                </tr>
                <tr>
                    <td>Puertas</td>
                    <td><input name="Puertas2" type="radio"></td>
                    <td><input name="Puertas2" type="radio"></td>
                    <td><input name="Puertas2" type="radio"></td>
                </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="printCheckList" class="btn btn-primary">Imprimir</button>
      </div>
    </div>
  </div>
</div>


@section('scripts')
  @parent

 <script src="{{ asset('js/utils/inputNumberUtil.js') }}"></script>
  <script src="{{ asset('js/salidas/appSalidas.js') }}"></script>
  <script src="{{ asset('js//bootstrap/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('js//bootstrap/bootstrap-select.js') }}"></script>
  
  @endsection