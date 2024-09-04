<!DOCTYPE html>

<html lang="es">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Dental +</title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Clinica Dental Mas">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="">


	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />

	<!-- 
  Essential stylesheets
  =====================================-->
	
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/icofont/icofont.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/slick-carousel/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/slick-carousel/slick/slick-theme.css') }}">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/dental-css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/flaticon.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	<link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet'>

</head>

<body id="top">

	@include('web-dentalmas.topbar')
	@yield('contenido')
	@include('web-dentalmas.compromiso')
	@include('web-dentalmas.footer')
	@include('web-dentalmas.modals')

	

	<script src="{{ URL::asset('assets/plugins/jquery/jquery.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/slick-carousel/slick/slick.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/shuffle/shuffle.min.js') }}"></script>

	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
	<script src="{{ URL::asset('assets/plugins/google-map/gmap.js') }} "></script>

	<script src="{{ URL::asset('assets/js/dental-js/script.js') }}"></script>


	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
    
	$('#redirect-sucursales').on('change', function() {
		var sucursal = $(this).val(); // get selected value
		console.log('redirect', sucursal)
		if (sucursal) {
			window.location = "/sucursal/" + sucursal;
		}
		return false;
	});

</script>
	

</body>

</html>