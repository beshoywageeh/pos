@extends('layouts.master') @section('title')
    {{trans('client.data')}}
@endsection
@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <
    </style>
@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between no">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{trans('client.title')}}</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('client.data')}}</span>
        </div>

    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <span class="card-title">{{trans('client.data') .' : '.$client->name}}</span>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex right-content">
                            <div class="pr-1 mb-3 mb-xl-0">
                                <a class="btn btn-success-gradient btn-sm float-left"
                                   href="{{route('print_client_balance',$client->id)}}" target="_blank">
                                    <i class="fas fa-print ml-1"></i>{{trans('general.print').' '.trans('client.balance')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="bg-secondary">
                            <tr>
                                <th colspan="4"><h5 class="text-white py-1">بيانات العميل</h5></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="column">
                                <th><span class='data'>{{trans('client.code')}}</span></th>
                                <th>{{$client->id}}</th>

                                <th><span class='data'>{{trans('client.name')}}</span></th>
                                <th>{{$client->name}}</th>

                            </tr>

                            <tr role="column">
                                <th><span class='data'>{{trans('client.address')}}</span></th>
                                <th>{{$client->address}}</th>

                                <th><span class='data'>{{trans('client.country')}}</span></th>
                                <th>{{$client->country->name}}</th>

                            </tr>
                            <tr role="column">
                                <th><span class='data'>{{trans('client.phone')}}</span></th>
                                <th>{{$client->phone}}</th>

                                <th><span class='data'>{{trans('client.balance')}}</span></th>
                                <th><em>{{$client->totalBalance()}}</em> {{env('MAIN_CURRENCY')}}</th>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h5 class="text-white py-2 bg-secondary d-block text-center">{{trans('client.balance')}}</h5>

                    <div class="table-responsive">
                        <table id="example2" class="table key-buttons text-md-nowrap report_table text-center"
                               style="width: 98%">

                            <thead>


                            <tr>
                                <th class="wd-2" style="padding: 0;width: 2px; margin: 0">#</th>
                                <th><span class='data'>{{trans('sales.inv_num')}}</span></th>
                                <th><span class='data'>{{trans('sales.total')}}</span></th>
                                <th><span class='data'>{{trans('sales.user')}}</span></th>
                                <th><span class='data'>{{trans('sales.date')}}</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sales as $sale)
                                <tr role="row">
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href='{{route('saleinv',['id'=>$sale->id])}}'>{{$sale->inv_num}}</a>
                                    </td>
                                    <td>{{$sale->formatcurrncy()}} {{env('MAIN_CURRENCY')}}</td>
                                    <td>{{$sale->user->first_name}}</td>
                                    <td>{{$sale->formatdate()}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">{{trans('client.report_msg')}}</td>
                                </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        @endsection
        @section('js')

            <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
            <!--Internal  Datatable js -->
            <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
