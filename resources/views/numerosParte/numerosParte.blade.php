@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Capturar numero de parte</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    @section('mensajesBackEnd')
                    @parent
                    @endsection
                    <form class="form" method="POST" action="/numerosParte">
                     {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-4">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">Número</label>
                            <div class="input-group-addon">Número</div>
                            <input type="number" min="0" class="form-control" name="Numero" id="Numero" placeholder="Numero" required>
                          </div>

                        </div>
                        <div class="col-md-4">

                          <div class="input-group">
                            <label class="sr-only" for="lote">Descripción</label>
                            <div class="input-group-addon">Descripción</div>
                            <textarea class="form-control" name="Descripcion" id="Descripcion" placeholder="Descripcion" required></textarea>
                          </div>

                        </div>

                        <div class="col-md-3">
                          <div class="input-group">
                            <label class="sr-only" for="ubicacion">Area</label>
                            <div class="input-group-addon">Area</div>
                            <select class="form-control" id="Area" name="Area">    
                              <option value="Ninguna">Ninguna</option>
                              <option value="Frozen -22">Frozen -22</option>
                              <option value="Cooled">Cooled</option>
                              <option value="Ambient">Ambient</option>
                              <option value="Frozen -55">Frozen -55</option>
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6">

                          <div class="input-group">

                            <label class="sr-only" for="unidadMedida">Unidad de medida</label>
                            <div class="input-group-addon">Unidad de medida</div>
                            <select class="form-control" id="unidadMedida" name="unidadMedida">
                              <option value="0">Seleccione...</option>
                              @foreach($Unidades as $unidad)
                              <option value="{{$unidad->id}}">{{$unidad->abreviatura}} - {{$unidad->nombre}}</option>
                              @endforeach
                            </select>
                          </div>

                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit"  class="btn btn-primary">Agregar</button>
                        <button class="btn btn-danger" onclick="$('form').reset">Limpiar datos</button>
                      </div>
                   
                    </form>

                </div>
            </div>
            <!-- aqui va la informacion que se va a cargar a la tabla de entradas -->
            <div class="panel panel-default">
                <div class="panel-heading">Numeros de parte</div>

                <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table" id="dataTable">
                        <thead>
                          <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>Area</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($numerosParte as $parte)
                            <tr>
                                <td>{{$parte->gin}}</td>
                                <td>{{$parte->descripcion}}</td>
                                <td>{{$parte->area}}</td>
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


  

@endsection
