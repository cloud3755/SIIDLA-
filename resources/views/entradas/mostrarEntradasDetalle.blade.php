@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">ID</label>
                            <div class="input-group-addon">ID</div>
                            <input disabled type="text" value="{{$entradaMaster->id}}" /> 
                          </div>

                        </div>
                        
                        <div class="col-md-3">

                          <div class="input-group">

                     
                            <div class="input-group-addon">Entrada</div>
                            <input disabled type="text" value="{{$entradaMaster->fecha_entrada}}" /> 
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">Usuario</label>
                            <div class="input-group-addon">usuario</div>
                            <input disabled type="text" value="{{$entradaMaster->usuario}}" /> 
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="input-group">

                            <label class="sr-only" for="GIN">Sucursal</label>
                            <div class="input-group-addon">Sucursal</div>
                            <input disabled type="text" value="{{$entradaMaster->sucursal}}" /> 
                          </div>

                        </div>

                      </div>
                    </div>
                </div>  
                <div class="panel panel-default">
                <div class="panel-heading">Detalle de la entrada {{$entradaMaster->id}}</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <div class="table-responsive">
                    
                      <table class="table" id="tableEntrada">
                        <thead>
                          <tr>
                            <th>gin</th>
                            <th>lote</th>
                            <th>ubicacion</th>
                            <th>cantidad</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($entradaDetalle as $detalle)
                        <tr>
                          <td>{{$detalle->gin}}</td>
                          <td>{{$detalle->lote}}</td>
                          <td>{{$detalle->ubicacion}}</td>
                          <td>{{$detalle->cantidad}}</td>
                         
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
@section('scripts')
  @parent
  <script src="{{ asset('js/app.js') }}"></script>
  
  @endsection
@endsection
