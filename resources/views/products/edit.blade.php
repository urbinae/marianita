@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Producto <a href="{{ route('products.index') }}" class="btn btn-default btn-sm pull-right">Listar</a></div>
                <div class="panel-body">
                    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
                        @include('products.partials.form')
                        <div class="form-group">
                            @if ("{{$product->imgs}}")
                                <img src="{{ url('/') }}/{{$product->imgs}}" width="200" height="200" />
                                <label>Foto</label>
                                <div class="input-field">
                                    {!! Form::File('imgs',null,['id'=>'imgs', 'class'=>'form-control']) !!}
                                </div>
                            @endif
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
