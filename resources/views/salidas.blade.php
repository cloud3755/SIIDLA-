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

                        <form class="form" >
                        
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">SALIDA</button>
                            <button class="btn btn-danger">Limpiar datos</button>
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
                        <table class="table">
                            <tr>
                            <th>GIN</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th>LOTE</th>
                            <th>UBICACION</th>
                            <th>FECHA</th>
                            <th>APLICAR</th>
                            <th>CANTIDAD A DAR SALIDA</th>
                            </tr>
                            <tr>
                            <td>100160</td>
                            <td>FD-DVS CHN-11\20X500U</td>
                            <td>10</td>
                            <td>125</td>
                            <td>A01-04</td>
                            <td>18/10/2017</td>
                            <td><input type="checkbox" checked></td>
                            <td><input type="number" ></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->
    </div>
</div>
@endsection
