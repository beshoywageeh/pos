<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('layouts.head_print')

</head>
<style>
    * {
        font-family: 'Cairo', sans-serif;
        text-transform: capitalize;
    }

    .table thead th {
        font-size: 1rem;
    }

</style>
@if(App::getLocale()=='en')
    <style>
        .main-header {
            left: 0 !important;
            padding-left: 240px !important;
            position: fixed !important;
        }

        .float-end.my-auto.ms-auto {
            margin-left: auto;
        }
    </style>
@else
    <style>
        .main-header {
            right: 0 !important;
            padding-right: 240px !important;
            position: fixed !important;
        }

        .float-end.my-auto.ms-auto {
            margin-right: auto;
        }
    </style>
@endif
<body class="main-body">

<!-- /Loader -->
<!-- main-content -->
<div class="">
    <!-- container -->
    <div class="">
        @yield('content')
    </div>

</div>

@include('layouts.footer-scripts')
</body>
</html>
