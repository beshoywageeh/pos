<!-- Title -->
<title> @yield('title',env('APP_NAME'))</title>
<!-- Favicon -->

<link rel="stylesheet" href="{{URL::asset('assets/css/adminlte.min.css')}}">
@if(App::getLocale()=='ar')

<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-rtl.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/adminlte-rtl.min.css')}}">

@else
@endif
@stack('css')
