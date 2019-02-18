<!DOCTYPE HTML>

<html>
	<head>
		<title>Unidos por Marianita</title>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/template-web/assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="/css/app.css">
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				
				<div class="inner">
					<a href="#" class="image avatar"><img src="{{$user->profile_picture}}" alt="" /></a>
					<h1><strong>Hola, soy {{$user->full_name}}</strong><br> una super guerrera<br />
					con muchas ganas de vivir.<br />
					Apóyame! <br />
					<h5><a href="/methods" class="btn btn-info">Colabora</a></h5></h1>
				</div>
			</header>

		@yield('content')

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.instagram.com/ayudemosamarianita/?hl=es-la" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://www.facebook.com/unidosxmarianita" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
					
				</div>
			</footer>

		<!-- Scripts -->
			<script src="/template-web/assets/js/jquery.min.js"></script>
			<script src="/template-web/assets/js/jquery.poptrox.min.js"></script>
			<script src="/template-web/assets/js/browser.min.js"></script>
			<script src="/template-web/assets/js/breakpoints.min.js"></script>
			<script src="/template-web/assets/js/util.js"></script>
			<script src="/template-web/assets/js/main.js"></script>
			<script src="/js/app.js"></script>

	</body>
</html>