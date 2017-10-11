<!DOCTYPE html>
<html>
<head>
	<title>Domain Archived - @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body class="container">
	<div class="navbar navbar-default">
		<h2 class="text-center">Domain wayback last archived</h2>
	</div>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>