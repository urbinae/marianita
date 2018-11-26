<div class="form-group">
	<label>Nombre</label>
	<div class="input-field">
	{!!Form::text('name',null,['id'=>'name', 'class'=>'form-control', 'placeholder'=>'Nombre', 'required'=>'required'])!!}
	</div>
</div>
<div class="form-group">
	<label>Categoría</label>
	<div class="input-field">
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<label>Precio</label>
	<div class="input-field">
	{!!Form::text('sale_price',null,['id'=>'sale_price', 'class'=>'form-control', 'placeholder'=>'Precio de Venta', 'required'=>'required'])!!}
	</div>
</div>
<div class="form-group">
	<label>Descripción</label>
	<div class="input-field">
	{!! Form::textarea('description',null,['id'=>'description', 'class'=>'form-control', 'rows' => 5, 'cols' => 40, 'required'=>'required']) !!}
	</div>
</div>

