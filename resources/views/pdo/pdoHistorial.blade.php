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
                        <form id="formConsultar" class="form"   enctype="multipart/form-data" method="POST"  action="/historial/pdo">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="input-group">

                                        <label class="sr-only" for="fechaIni">Fecha Inicio</label>
                                        <div class="input-group-addon">Fecha Inicio</div>
                                        <input type="date"  class="form-control" name="fechaIni" id="fechaIni" placeholder="Fecha Inicio" required>


                                    </div>
                                    <br>  <br>
                                    <div class="input-group">

                                        <label class="sr-only" for="fechaFinal">Fecha Final</label>
                                        <div class="input-group-addon">Fecha Final</div>
                                        <input type="date"  class="form-control" name="fechaFinal" id="fechaFinal" placeholder="Fecha Final" required>


                                    </div>
                                </div>



                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Consultar</button>

                            </div>

                        </form>

                    </div>
                    <form id="formZip" class="form"   enctype="multipart/form-data" method="POST"  action="/create-zip">
                        {{ csrf_field() }}

                        <input type=hidden name=fechaInih id="fechaInih" value=0>
                        <input type=hidden name=fechaFinalh id="fechaFinalh" value=0>
                    <div class="table-responsive">
                        <table class="table" id="tableEntrada">
                            <thead>
                            <tr>
                                <th>ID Invoice</th>
                                <th>Invoice</th>
                                <th>Descarga</th>
                                <th>Selecionar</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach($historial as $historia)
                                <tr>

                                    <td>{{$historia->id}}</td>
                                    <td>{{$historia->serial}}</td>
                                    <td><a href="{{route('descargaPdo', ['id' => $historia->id])}}">Descargar</a></td>

                                    <td><input class="least1" type="checkbox" name="cbox[]" value="{{$historia->ruta_archivo}}"> </td>



                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="zip"  id="zip"   class="btn btn-primary">Descargar zip</button>

                </div>
                </form>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
    @parent


    <script src="{{ asset('js/pdo/pdo.js') }}"></script>

@endsection