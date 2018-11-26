
@extends('web.layout')
<!-- Main -->
@section('content')
<div id="main">
	<!-- One -->
	<section id="one">
		<header class="major">
			<h2>Modos de pago que puedes usar para ayudarme<br />
			</header>
			<p>Puedes ayudarme a través de paypal o transferencia bancaria</p>
		<h5><a href="{{ URL::previous() }}" class="button">Volver</a></h5>
			
	</section>

	<!-- Two -->
	<section id="two">
			<div class="row">
				<article class="col-4 col-12-xsmall">
					<a href="/donation" class="image fit thumb"><img src="images/paypal_logo.png" alt="" /></a>
				</article>
				<article class="col-4 col-12-xsmall">
					<a href="/transfer" class="image fit thumb"><img src="images/transferencia.png" alt="" /></a>
				</article>
			</div>
	</section>
</div>
@endsection