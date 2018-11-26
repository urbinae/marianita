@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Producto<a href="{{ route('products.index') }}" class="btn btn-default btn-sm pull-right">Listar</a></div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'products.store','method'=>'POST', 'enctype'=>'multipart/form-data', 'files'=>true)) !!}
                        @include('products.partials.form')
                        <div class="form-group">    
                            <label>Foto</label>
                            <div class="input-field">
                                {!! Form::File('imgs',null,['id'=>'imgs', 'class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
