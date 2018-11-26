@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categoría 
                <a href="{{ route('categories.index') }}" class="btn btn-default btn-sm pull-right">Listar</a></div>
                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $category->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
