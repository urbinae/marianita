@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mensajes
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Fecha</th>
                              <th>Nombre</th>
                              <th>Correo</th>
                              <th>Mensaje</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($mensajes as $mensaje)
                                <tr>
                                    <td>{{date ('F d, Y', strtotime($mensaje->created_at))}}</td>
                                    <td>{{$mensaje->name}}</td>
                                    <td>{{$mensaje->email}}</td>
                                    <td>{{$mensaje->message}}</td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{$mensajes->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
