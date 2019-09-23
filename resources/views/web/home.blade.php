@extends('web.layout')
<!-- Main -->
@section('content')
<div id="main">

	<!-- One -->
	<section id="one">
		<header class="major">
			<h2>Bienvenidos a Mi Sitio Web<br />
		</header>
		<p>Aquí podrás entrar cuando quieras. Siempre serás bienvenido. <br>
			Podrás ver algunas de mis fotos. También puedes escribirme que yo te responderé</p>

	</section>

	<!-- Two -->
	<section id="two">
		@if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
		@if (session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
		@endif
		<h2>Fotos recientes</h2>
		<div class="row">
			@foreach($response as $item)
			<article class="col-4 col-12-xsmall work-item">
				<a href="{{$item->images->standard_resolution->url}}" class="image fit thumb"><img src="{{$item->images->thumbnail->url}}" alt="" /></a>
			</article>
			@endforeach
		</div>
		<!--<ul class="actions">
							<li><a href="#" class="button">Ver Todas</a></li>
						</ul>-->
	</section>
	<!-- Three -->
	<section id="three">
		<h2>Contáctame</h2>
		<p>Puedes escribirme un mensaje de texto.</p>
		<div class="row">
			<div class="col-8 col-12-small">
				<div id="form"></div>
			</div>
			<div class="col-4 col-12-small">
				<ul class="labeled-icons">
					<li>
						<h3 class="icon fa-home"><span class="label">Dirección</span></h3>
						Pregonero <br />
						Estado Táchira<br />
						Venezuela
					</li>
					<li>
						<h3 class="icon fa-mobile"><span class="label">Teléfono</span></h3>
						+58 416-771-7227
					</li>
					<li>
						<h3 class="icon fa-envelope-o"><span class="label">Correo</span></h3>
						unidosxmarianita@gmail.com
					</li>
				</ul>
			</div>
		</div>
	</section>
</div>
@endsection