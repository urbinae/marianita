transfer
@extends('web.layout')
<!-- Main -->
@section('content')
<div id="main">
	<!-- One -->
	<section id="one">
		<header class="major">
			<h2>Números de cuenta a los que puedes transferir.<br />
			</header>
			<p>Puedes ayudarme a través de una transferencia bancaria.</p>
			<h5><a href="{{ route('home') }}" class="button">Volver</a></h5>
		</section>

		<!-- Two -->
		<section id="two">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">SOFITASA, Venezuela</div>
				</div>
				<div class="panel-body">
					Número: 0137-0001-0400-5502<br>
					A nombre de: FRAMM URBINA, (PADRE)<br>
					C.I: 15.433.313<br>
					Telf: +58 (416) 771 7227
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">BICENTENARIO, Venezuela</div>
				</div>
				<div class="panel-body">
					Número: 0175-0038-4600-7067<br>
					A nombre de: LILIBETH ROMERO, (MADRE)<br>
					C.I: 16.125.986<BR>
					Telf: +58 (416) 175 1973
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">BANESCO, Venezuela</div>
				</div>
				<div class="panel-body">
					Número: <br>
					A nombre de: EIMAR URBINA, (TIO)<br>
					C.I: 16.787.704<br>
					Telf: +58 (424) 784 0269
				</div>
			</div>
		</section>
	</div>
	@endsection