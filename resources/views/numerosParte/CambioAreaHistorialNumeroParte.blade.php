@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resumen movimientos</div>

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
                            <th>Numero de parte</th>
                            <th>Usuario</th>
                            <th>Area Anterior</th>
                            <th>Nueva area</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($numerosParte as $numero)
                        <tr>
                            <td>{{$numero->gin}}</td>
                            <td>{{$numero->id_usuario}} - {{$numero->usuario}} </td>
                            <td>{{$numero->area_anterior}}</td>
                            <td>{{$numero->nueva_area}}</td>
                            <td>{{$numero->fecha_movimiento}}</td>
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

@section('scripts')
  @parent  
  @endsection
