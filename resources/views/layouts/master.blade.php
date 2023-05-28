<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @include('layouts.head')

    @livewireStyles

</head>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button{
    padding: .5em 0 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
     color: white !important;
     border: none !important;
     background-color: transparent !important;
     background: transparent !important;
     background: transparent !important;
    background: transparent !important;
    background: transparent !important;
    background:transparent !important;
     background: transparent !important;
}
@if (App::getlocale()=='ar')
.dataTables_wrapper .dataTables_length{
float:right;
}
.dataTables_wrapper .dataTables_filter{
    float:left;
}
.dataTables_wrapper .dataTables_paginate{
    float: left !important;
}
.dataTables_wrapper .dataTables_info{
    float:right !important;
}
@endif
</style>


<body class="sidebar-mini layout-fixed">
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
    @livewireScripts
</body>

</html>
