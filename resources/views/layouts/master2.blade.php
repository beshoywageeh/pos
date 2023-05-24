<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		@include('layouts.head')
	</head>

	<body class="hold-transition login-page">

		@yield('content')
		@include('layouts.footer-scripts')
	</body>
</html>
