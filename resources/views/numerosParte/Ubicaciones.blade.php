@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <!--<div class="col-md-12 col-md-offset-1">-->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Capturar ubicaciones</div>

                    <div class="panel-body">
                        <!-- @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif -->
                        @section('mensajesBackEnd')
                        @parent
                        @endsection
                        <form class="form" method="POST" action="/ubicaciones">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="input-group">

                                        <label class="sr-only" for="ubicacion">Ubicacion</label>
                                        <div class="input-group-addon">Ubicacion</div>
                                        <input type="text" class="form-control" name="ubicacion" placeholder="Ubicacion" required>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="input-group">

                                        <label class="sr-only" for="chkRango">Agregar rango</label>
                                        <div class="input-group-addon">Agregar rango</div>
                                        <input type="checkbox" class="form-control" name="chkRango" id="chkRango">
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="input-group">

                                        <label class="sr-only" for="inferior">Inferior</label>
                                        <div class="input-group-addon">Inferior</div>
                                        <input type="number" value="1" min="0" class="form-control chkStatus" id="inferior" name="inferior" placeholder="inferior">
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="input-group">

                                        <label class="sr-only" for="superiorGIN">Superior</label>
                                        <div class="input-group-addon">Superior</div>
                                        <input  type="number" value="10" class="form-control chkStatus" id="superior" name="superior" placeholder="Ubicacion">
                                    </div>

                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="submit"  class="btn btn-primary">Agregar</button>
                                <button class="btn btn-danger" onclick="$('form').reset">Limpiar datos</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-md-offset-1">
            <!-- aqui va la informacion que se va a cargar a la tabla de entradas -->
                <div class="panel panel-default">
                    <div class="panel-heading">Ubicaciones</div>

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
                                <th>id</th>
                                <th>ubicacion</th>
                                <th>id</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->
    </div>
</div>
@endsection

@section('scripts')
  @parent
    <script src="{{ asset('js/numerosParte/ubicacionesApp.js') }}"></script>
  @endsection
