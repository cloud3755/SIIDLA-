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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Capturar entrada</div>

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
                      <div class="row">
                        <div class="col-xs-4">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">GIN</label>
                            <div class="input-group-addon">GIN</div>
                            <select class="form-control selectpicker" id="ginsel" name="gin" data-live-search="true" data-width="100%" required>
                              @foreach($num as $numeros)
                              <option data-descripcion="{{$numeros->Descripcion}}" value="{{$numeros->Numero}}">{{$numeros->Numero}}</option>
                              @endforeach
                            </select>
                          </div>

                        </div>
                        <div class="col-xs-3">

                          <div class="input-group">
                            <label class="sr-only" for="lote">Lote</label>
                            <div class="input-group-addon">Lote</div>
                            <input type="text" class="form-control" id="lote" placeholder="Lote">
                          </div>

                        </div>

                        <div class="col-xs-5">
                          <div class="input-group">
                            <label class="sr-only" for="ubicacion">Ubicacion</label>
                            <div class="input-group-addon">Ubicacion</div>
                            <select class="form-control selectpicker" id="ubicacionsel" data-live-search="true" data-width="100%" name="ubicacion">
                              @foreach ($ubica as $ubicacion)
                              <option value="{{$ubicacion->Ubicacion}}">{{$ubicacion->Ubicacion}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                      </div>
                      <br>

                      <div class="row">
                        <div class="col-xs-4">
                          <div class="input-group">
                            <label class="sr-only" for="cantidad">Cantidad</label>
                            <div class="input-group-addon">Cantidad</div>
                            <input type="text" class="form-control" id="cantidad" placeholder="Cantidad">
                          </div>
                        </div>

                        <div class="col-xs-7">
                          <div class="input-group">
                            <label class="sr-only" for="cantidad">Fecha de caducidad</label>
                            <div class="input-group-addon">Caducidad</div>
                            <input type="date" id="fechaCaducidad" name="fechaCaducidad">
                          </div>
                        </div>
                      </div>

                      <br>
                      <div class="row">
                        <div class="col-xs-4">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">Site</label>
                            <div class="input-group-addon">Site</div>

                            <select {{(Auth::user()->id_rol ==1 || Auth::user()->id_rol ==2) ? ""  : "disabled"}}  class="form-control" id="sucursal" name="sucursal" required>
                              @foreach($sucursales as $sucursal)
                              @if(Auth::user()->id_sucursal==$sucursal->id)
                                <option value="{{$sucursal->id}}" selected>{{$sucursal->nombre}}</option>
                              @else
                                <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                              @endif
                              @endforeach
                            </select>


                          </div>

                        </div>
                      </div>


                      <br>
                      <div class="text-center">
                        <button type="button" id="agregarEntrada" class="btn btn-primary">Agregar</button>
                        <button class="btn btn-danger">Limpiar datos</button>
                      </div>

                    </form>

                </div>
            </div>
            <!-- aqui va la informacion que se va a cargar a la tabla de entradas -->
            <div class="panel panel-default">
                <div class="panel-heading">Entrada</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <div class="table-responsive">
                    <button id="Procesar" type="button">Procesar</button>
                      <table class="table" id="tableEntrada">
                        <thead>
                          <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th>LOTE</th>
                            <th>UBICACION</th>
                            <th>FECHA</th>
                            <th>Quitar</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    <form hidden  id="form" method="POST" action="/entradas" }}>
                       {{ csrf_field() }}
                      <input type="text" id="datosEntrada" name="datosEntrada" />
                      <input type="number" id="id_sucursal" name="id_sucursal" />
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <form class="" action="/subirarchivo" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group form-group-lg">
  <h2><label for="Usuario" class="control-label col-md-12">(*) Archivo:</label></h2>
  <div class="col-md-6 col-sm-9">
    <input class="form-control input-lg" id="archivo" type="file" placeholder="Elige el archivo" name="archivo" required>
  </div>
</div>

<div class="modal-footer">
<button type="submit" class="btnobjetivo" id="btnobjetivo" style="font-family: Arial;">Subir Documento</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseUpload">Cerrar</button>
</div>

</form> -->




@endsection
@section('scripts')
@parent
<script src="{{ asset('js/utils/date.js') }}"></script>
<script src="{{ asset('js/entradas/appEntradas.js') }}"></script>
@endsection
