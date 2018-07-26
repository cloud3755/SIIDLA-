@extends('layouts.app')
@section('styles')
    @parent
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subir pdo</div>

                    <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                                </div>
@endif -->
                        @section('mensajesBackEnd')
                            @parent
                        @endsection
                        <form class="form"   enctype="multipart/form-data" method="POST"  action="/pdo">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="input-group">

                                        <label class="sr-only" for="serial">No. Referencia</label>
                                        <div class="input-group-addon">No. Referencia</div>
                                        <input type="text"  class="form-control" name="serial" id="serial" placeholder="No. Referencia" required>


                                    </div>
                                    <br>  <br>
                                    <div class="input-group">
                                        <label class="sr-only" for="Imagen">Imagen</label>
                                        <div class="input-group-addon">Imagen</div>
                                        <input accept="image/*" type="file" id="Ticket" name="Ticket" required>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label class="sr-only"  for="id_cliente">Cliente</label>
                                        <div class="input-group-addon">Cliente</div>
                                        <select class="form-control"  id="id_cliente" name="id_cliente" required>
                                            <option value="Ninguna">Ninguna</option>
                                            <option value="1">Cliente1</option>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit"  class="btn btn-primary">Agregar</button>

                            </div>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>




@endsection
@section('scripts')
    @parent




@endsection