<!-- Title -->
<title> @yield('title',env('APP_NAME'))</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ URL::asset('assets/img/AdminLTELogo.png') }}"/>
<link rel="icon" type="image/png" href="{{ URL::asset('assets/img/AdminLTELogo.png') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/css/adminlte.min.css')}}">
@if(App::getLocale()=='ar')

<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-rtl.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/adminlte-rtl.min.css')}}">

@else
@endif

<link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">

@stack('css')
