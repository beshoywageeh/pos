<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @include('layouts.head')
</head>

@if (App::getLocale() == 'en')
@else

@endif

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Loader -->

    <div class="wrapper">

        <!-- /Loader -->
        @include('layouts.main-header')
        @include('layouts.main-sidebar')
        <!-- main-content -->
        <!-- container -->
        <div class="content-wrapper">
            @yield('page-header')
            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('layouts.footer')


    </div>
    @include('layouts.footer-scripts')

</body>

</html>
