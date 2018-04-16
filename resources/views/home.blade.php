@extends('layouts.app')

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

                    <form class="form" >
                      <div class="row">
                        <div class="col-xs-4">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">GIN</label>
                            <div class="input-group-addon">GIN</div>
                            <select class="form-control" id="ginsel" name="gin" required>
                              <option>1</option>
                              <option>2</option>
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
                            <select class="form-control" id="ubicacionsel" name="ubicacion">
                              <option>A01-01</option>
                              <option>A01-02</option>
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
                            <input type="date" name="fecha">
                          </div>
                        </div>

                      </div>

                      <br>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Agregar</button>
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
                      <table class="table">
                        <tr>
                          <th>GIN</th>
                          <th>DESCRIPCION</th>
                          <th>CANTIDAD</th>
                          <th>LOTE</th>
                          <th>UBICACION</th>
                          <th>FECHA</th>
                        </tr>
                        <tr>
                          <td>100160</td>
                          <td>FD-DVS CHN-11\20X500U</td>
                          <td>10</td>
                          <td>125</td>
                          <td>A01-04</td>
                          <td>18/10/2017</td>
                        </tr>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
