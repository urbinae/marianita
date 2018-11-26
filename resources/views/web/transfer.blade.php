transfer
@extends('web.layout')
<!-- Main -->
@section('content')
<div id="main">
	<!-- One -->
	<section id="one">
		<header class="major">
			<h2>Números de cuenta a los que puedes transferir desde cualquier parte del mundo<br />
			</header>
			<p>Puedes ayudarme a través de una transferencia bancaria.</p>
			<h5><a href="{{ route('home') }}" class="button">Volver</a></h5>
		</section>

		<!-- Two -->
		<section id="two">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">Banesco</div>
				</div>
				<div class="panel-body">
					Número: <br>
					A nombre de: <br>
					C.I:
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">Sofitasa</div>
				</div>
				<div class="panel-body">
					Número: <br>
					A nombre de: <br>
					C.I:
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">Venezuela</div>
				</div>
				<div class="panel-body">
					Número: <br>
					A nombre de: <br>
					C.I:
				</div>
			</div>
		</section>
	</div>
	@endsection