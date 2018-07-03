@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Capturar unidad de medida</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    @section('mensajesBackEnd')
                    @parent
                    @endsection
                    <form class="form" method="POST" action="/unidadMedida">
                     {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-4">

                          <div class="input-group">

                            <label class="sr-only" for="Nombre">Nombre</label>
                            <div class="input-group-addon">Nombre</div>
                            <input type="text"  class="form-control" name="Nombre" id="Nombre" placeholder="Nombre" required>
                          </div>

                        </div>
                        <div class="col-md-4">

                          <div class="input-group">
                            <label class="sr-only" for="Descripcion">Descripción</label>
                            <div class="input-group-addon">Descripción</div>
                            <textarea class="form-control" name="Descripcion" id="Descripcion" placeholder="Descripcion" ></textarea>
                          </div>

                        </div>
                        <div class="col-md-4">

                          <div class="input-group">
                            <label class="sr-only" for="Abreviatura">abreviatura</label>
                            <div class="input-group-addon">abreviatura</div>
                            <input type="text"  class="form-control" name="Abreviatura" id="Abreviatura" placeholder="Abreviatura">
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
            <!--  -->
            <div class="panel panel-default">
                <div class="panel-heading">Unidades de medida</div>

                <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table" id="dataTable">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>abreviatura</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($Unidades as $Unidad)
                            <tr>
                                <td>{{$Unidad->id}}</td>
                                <td>{{$Unidad->nombre}}</td>
                                <td>{{$Unidad->descripcion}}</td>
                                <td>{{$Unidad->abreviatura}}</td>
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
