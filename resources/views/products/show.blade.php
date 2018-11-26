@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Producto <a href="{{ route('products.index') }}" class="btn btn-default btn-sm pull-right">Listar</a></div>
                <div class="panel-body">
                    <p><strong>Nombre </strong> {{ $product->name }}</p>
                    <p><strong>Categoría </strong> {{ $product->category->name }}</p>
                    <p><strong>Descripción </strong> {{ $product->Description }}</p>
                    <p><strong>Precio </strong> {{ $product->sale_price }}</p>
                    <p><img width="300" height="300" src="{{ url($product->imgs)}}" alt="IMG-PRODUCT"></p>
                    <div>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm pull-right">Modificar</a>
            </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
