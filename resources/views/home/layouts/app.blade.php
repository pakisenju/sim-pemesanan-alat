<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIM Pemesanan - @yield('title')</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />

	<!-- Bootstrap & Plugins CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="{{ asset('assets/css/dark.css') }}" rel="stylesheet" type="text/css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118135390-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-118135390-1');
	</script>
    @yield('style')
</head>
<body>

	<!-- ***** Preloader Start ***** -->
	<div id="preloader">
		<div class="jumper">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->


	<!-- ***** Header Area Start ***** -->
	@include('home.layouts.header')
	<!-- ***** Header Area End ***** -->


	@yield('content')


	<!-- ***** Footer Start ***** -->
    @include('home.layouts.footer')
	<!-- ***** Footer End ***** -->

    @include('home.layouts.js-file')
    @yield('script')
</body>
</html>
