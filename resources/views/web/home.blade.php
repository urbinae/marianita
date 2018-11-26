
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
        <p>Puedes escribirme un mensaje aquí abajo en las cajitas de texto.</p>
		<div id="form"></div>
	</section>
</div>
@endsection