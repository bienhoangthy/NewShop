<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="{{ asset('front/auth/img/logo-icon.png') }}">
	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{ asset('front/auth/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/auth/css/material-kit.css') }}" rel="stylesheet"/>
</head>


<body class="signup-page">
	<div class="se-pre-con"></div>
	@yield('content')

	
</body>
	<!--   Core JS Files   -->
	<script src="{{ asset('front/auth/js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('front/auth/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('front/auth/js/material.min.js') }}"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ asset('front/auth/js/nouislider.min.js') }}" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{ asset('front/auth/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{ asset('front/auth/js/material-kit.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});
	</script>
</html>