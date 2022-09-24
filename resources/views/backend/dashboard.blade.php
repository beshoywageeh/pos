@extends('layouts.master')
@section('css')
    <link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">

@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('general.welcome') }} {{ $data['name'] }}</h2>

            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- breadcrumb -->

    <!-- breadcrumb -->
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-primary-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon1 mt-2 text-center">
                                <a href="{{route('client.index')}}" class="text-white"><i class="fe fe-users tx-40"></i></a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mt-0 text-center">
                                <span class="text-white">{{trans('client.title')}}</span>
                                <h4 class="text-white mb-0">{{$data['clients']}}</h4>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-danger-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon1 mt-2 text-center">
                                <a href="{{route('sales.index')}}" class="text-white"><i
                                        class="fe fe-shopping-cart tx-40"></i></a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mt-0 text-center">
                                <span class="text-white">{{trans('general.tsales')}}</span>
                                <h4 class="text-white mb-0">{{$data['total_sales']}} {{env('MAIN_CURRENCY')}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-success-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon1 mt-2 text-center">
                                <a href="#" class="text-white"><i class="fe fe-bar-chart-2 tx-40"></i></a>

                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mt-0 text-center">
                                <span class="text-white">{{trans('general.income')}}</span>
                                <h4 class="text-white mb-0">98K</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-warning-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon1 mt-2 text-center">
                                <a href="#" class="text-white"><i class="fe fe-pie-chart tx-40"></i></a>

                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mt-0 text-center">
                                <span class="text-white">{{trans('general.expenses')}}</span>
                                <h4 class="text-white mb-0">876</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{ trans('general.sales') }}
                    </div>
                    <div class="morris-wrapper-demo" id="salesgraph"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-md-6">
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{ trans('general.lastten') }}
                    </div>
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#client" class="nav-link active"
                                                   data-toggle="tab"> {{ trans('client.title') }}</a></li>
                                            <li><a href="#sale_invoice" class="nav-link"
                                                   data-toggle="tab">{{ trans('invoice.invoice') }}</a></li>
                                            <li><a href="#money_transaction" class="nav-link"
                                                   data-toggle="tab">{{trans('general.money_transaction')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="client">
                                            @if($data['clientlast']->count() > 0)
                                                <div class="table">
                                                    <table
                                                        class="table report-table text-md-nowrap table-bordered text-center">
                                                        <thead class='alert-success'>
                                                        <tr>
                                                            <th>{{ trans('client.code') }}</th>
                                                            <th>{{ trans('client.name') }}</th>
                                                            <th>{{ trans('client.phone') }}</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($data['clientlast'] as $client)
                                                            <tr>
                                                                <td>{{ $client->id }}</td>
                                                                <td>{{ $client->name }}</td>
                                                                <td>{{ $client->phone }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-solid-danger text-center">
                                                    <h5 class="text-white d-block">{{trans('general.msg')}}</h5>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="sale_invoice">
                                            @if($data['saleslast']->count() > 0)
                                                <div class="table">
                                                    <table
                                                        class="table-reponsive report-table text-md-nowrap table-bordered text-center">
                                                        <thead class='alert-success'>
                                                        <tr>
                                                            <th>{{ trans('sales.inv_num') }}</th>
                                                            <th>{{ trans('client.name') }}</th>
                                                            <th>{{ trans('sales.date') }}</th>
                                                            <th>{{ trans('sales.total') }}</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($data['saleslast'] as $sale)
                                                            <tr>
                                                                <td>{{ $sale->inv_num }}</td>
                                                                <td>{{ $sale->client->name }}</td>
                                                                <td>{{ $sale->inv_date }}</td>
                                                                <td>{{ $sale->total }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-solid-danger text-center">
                                                    <h5 class="text-white d-block">{{trans('general.msg')}}</h5>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="money_transaction">
                                            @if($data['saleslast']->count() > 0)
                                                <div class="table">
                                                    <table
                                                        class="table-reponsive report-table text-md-nowrap table-bordered text-center">
                                                        <thead class='alert-success'>
                                                        <tr>
                                                            <th>{{ trans('sales.inv_num') }}</th>
                                                            <th>{{ trans('client.name') }}</th>
                                                            <th>{{ trans('sales.date') }}</th>
                                                            <th>{{ trans('sales.total') }}</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($data['saleslast'] as $sale)
                                                            <tr>
                                                                <td>{{ $sale->inv_num }}</td>
                                                                <td>{{ $sale->client->name }}</td>
                                                                <td>{{ $sale->inv_date }}</td>
                                                                <td>{{ $sale->total }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-solid-danger text-center">
                                                    <h5 class="text-white d-block">{{trans('general.msg')}}</h5>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <!-- row closed -->


            @endsection
            @section('js')
                <!--Internal  Morris js -->
                <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
                <!-- Internal Select2 js-->
                <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
                <!--Internal  Morris js -->
                <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
                <script src="{{URL::asset('assets/plugins/morris.js/morris.min.js')}}"></script>
                <!--Internal Chart Morris js -->

                <script>
                    var line = new Morris.Line({
                        element: 'salesgraph',
                        resize: 'true',
                        data: [
                                @foreach ($data['sales'] as $sale )
                            {
                                ym: "{{ $sale->year }}-{{ $sale->month }}",
                                sum: "{{ $sale->Total }} {{env('MAIN_CURRENCY')}}"
                            },

                            @endforeach
                        ],
                        xkey: 'ym',
                        ykeys: ['sum'],
                        labels: ['{{trans('general.tsales')}}'],
                        lineColors: ['#285cf7'],
                        lineWidth: 1,
                        ymax: 'auto 100',
                        gridTextSize: 11,
                        hideHover: 'auto',
                        resize: true
                    });

                </script>
@endsection
