@extends('layouts.app')
@section('styles')
@parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Historial numeros Parte</div>

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
                            <th>historial</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($inventario as $item)
                        <tr>
                            <td>{{$item->gin}}</td>
                            <td><a href="{{route('showNumeroParteHistorial', ['numeroParte' => $item->gin])}}">Historial</a></td>
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
