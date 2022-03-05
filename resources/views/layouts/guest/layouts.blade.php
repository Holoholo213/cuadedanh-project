<!DOCTYPE HTML>
<html>

<head>
	<title>{{ config('app.name', 'Cuadedanh') }}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href={{ asset("guest/assets/css/main.css") }} />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		@include('layouts/guest/header')

		@yield('content')

	</div>

	<!-- Scripts -->
	<script src={{ asset("guest/assets/js/jquery.min.js") }}></script>
	<script src={{ asset("guest/assets/js/browser.min.js") }}></script>
	<script src={{ asset("guest/assets/js/breakpoints.min.js") }}></script>
	<script src={{ asset("guest/assets/js/util.js") }}></script>
	<script src={{ asset("guest/assets/js/main.js") }}></script>

</body>

</html>