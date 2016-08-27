<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	{{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front/assets/img/logo-icon.png') }}"> --}}
	<link rel="icon" type="image/png" href="{{ asset('front/assets/img/logo-icon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/css/material-kit.css') }}" rel="stylesheet"/>

    <link href="{{ asset('front/assets/css/demo.css') }}" rel="stylesheet" />
</head>

<body class="index-page">
	<div class="se-pre-con"></div>
	@include('front.blocks.navbar')
<!-- Navbar will come here -->

<!-- end navbar -->

	<div class="wrapper">
		@yield('content')
		@include('front.blocks.footer')
	</div>
	@include('front.blocks.livechat')
</body>

	<!--   Core JS Files   -->
	<script src="{{ asset('front/assets/js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('front/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('front/assets/js/material.min.js') }}"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ asset('front/assets/js/nouislider.min.js') }}" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{ asset('front/assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{ asset('front/assets/js/material-kit.js') }}" type="text/javascript"></script>
	<!-- <script src="js/carousel-p.js" type="text/javascript"></script> -->
	<script src="{{ asset('front/assets/js/myscript.js') }}" type="text/javascript"></script>


</html>
