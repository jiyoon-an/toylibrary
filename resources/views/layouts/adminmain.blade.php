<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>SB Admin 2 - Bootstrap Admin Theme</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

	    <!-- MetisMenu CSS -->
	    <link href="{{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet" type="text/css">

	    <!-- Custom CSS -->
	    <link href="{{ URL::asset('dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">

	    <!-- Custom Fonts -->
	    <link href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body id="home" style="font-family: 'Baloo Da', Arial, sans-serif;">
		@include('info-admin.menu')

		@yield('content')

		@include('info-admin.chartfooter')
		
		<!-- jQuery -->
	    <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

	    <!-- Metis Menu Plugin JavaScript -->
	    <script src="{{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
		
		<!-- Morris Charts JavaScript -->
	    <script src="{{ URL::asset('bower_components/raphael/raphael-min.js') }}" type="text/javascript"></script>
	    <script src="{{ URL::asset('bower_components/morrisjs/morris.min.js') }}" type="text/javascript"></script>
	    <script src="{{ URL::asset('js/morris-data.js') }}" type="text/javascript"></script>

		<!-- Custom Theme JavaScript -->
	    <script src="{{ URL::asset('dist/js/sb-admin-2.js') }}" type="text/javascript"></script>
	</body>
</html>