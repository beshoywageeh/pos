<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		@include('layouts.head')
	</head>
<style>
    @if(App::getLocale()=='en')
    .main-header{
        left:0 !important;
        padding-left: 240px !important;
        position: fixed !important;
    }
    .float-end.my-auto.ms-auto{
        margin-left: auto;
    }
    @else
    .main-header{
        right:0 !important;
        padding-right: 240px !important;
        position: fixed !important;
    }
    .float-end.my-auto.ms-auto{
        margin-right: auto;
    }
    @endif
</style>
	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
<div class="page">
    <!-- /Loader -->
    @include('layouts.main-header')
    @include('layouts.main-sidebar')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            @yield('page-header')
            @yield('content')
        </div>

</div>
        @include('layouts.footer')

        @include('layouts.footer-scripts')
	</body>
</html>
