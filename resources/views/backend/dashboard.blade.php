@extends('layouts.master')
@push('css')
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
@endpush
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('general.welcome') }} <bdi> {{ $data['name'] }}</bdi></h2>

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
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon1 mt-2 text-center">
                                <a href="{{ route('client_index') }}" class="text-primary"><i
                                        class="fe fe-users tx-40"></i></a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mt-0 text-center">
                                <span class="text-primary">{{ trans('client.title') }}</span>
                                <h4 class="text-primary mb-0">{{ $data['clients'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
       

            <div class="card card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon1 mt-2 text-center">
                                <a href="{{ route('salesinvoice_index') }}" class="text-danger"><i
                                        class="fe fe-shopping-cart tx-40"></i></a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mt-0 text-center">
                                <span class="text-danger">{{ trans('general.tsales') }}</span>
                                <h4 class="text-danger mb-0">
                                    {{ number_format($data['total_sales']) . ' ' . env('MAIN_CURRENCY') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon1 mt-2 text-center">
                                <a href="#" class="text-success"><i class="fe fe-bar-chart-2 tx-40"></i></a>

                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mt-0 text-center">
                                <span class="text-success">{{ trans('general.income') }}</span>
                                <h4 class="text-success mb-0">
                                    {{ number_format($data['income']) . ' ' . env('MAIN_CURRENCY') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card card-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon1 mt-2 text-center">
                                <a href="#" class="text-warning"><i class="fe fe-pie-chart tx-40"></i></a>

                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mt-0 text-center">
                                <span class="text-warning">{{ trans('general.expenses') }}</span>
                                <h4 class="text-warning mb-0">
                                    {{ number_format($data['expenses']) . ' ' . env('MAIN_CURRENCY') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row row-sm">
        <div class="col-md-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <div class="main-content-label mg-b-5">
                        {{ trans('general.sales') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class='m-auto ' style="width:70
                    "> {!! $data['chart']->render() !!}</div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-header">
                    <div class="main-content-label mg-b-5">
                        {{ trans('general.lastten') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#client" class="nav-link active" data-toggle="tab">
                                                    {{ trans('client.title') }}</a></li>
                                            <li><a href="#sale_invoice" class="nav-link"
                                                    data-toggle="tab">{{ trans('invoice.invoice') }}</a></li>
                                            <li><a href="#money_transaction" class="nav-link"
                                                    data-toggle="tab">{{ trans('general.money_transaction') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="client">
                                            @if ($data['clientlast']->count() > 0)
                                            
                                               <div class="table-responsive">
                                                <table
                                                class="table table-sm table-bordered text-center">
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
                                                    <h5 class="text-white d-block">{{ trans('general.msg') }}</h5>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="sale_invoice">
                                            @if ($data['saleslast']->count() > 0)
                                    
                                                 <div class="table-responsive">
                                                    <table
                                                    class="table table-sm table-bordered text-center">
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
                                                                <td>{{ number_format($sale->total) . ' ' . env('MAIN_CURRENCY') }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                 </div>
                                          
                                            @else
                                                <div class="alert alert-solid-danger text-center">
                                                    <h5 class="text-white d-block">{{ trans('general.msg') }}</h5>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="money_transaction">
                                            @if ($data['money_treasary']->count() > 0)
                                        
                                                 <div class="table-responsive">
                                                    <table class="table table-sm table-bordered text-center">
                                                        <thead class='alert-success'>
                                                            <tr>
                                                                <th>{{ trans('sales.inv_num') }}</th>
                                                                <th>{{ trans('client.name') }}</th>
                                                                <th>{{ trans('sales.date') }}</th>
                                                                <th>{{ trans('sales.debit') }}</th>
                                                                <th>{{ trans('sales.credit') }}</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['money_treasary'] as $transaction)
                                                                <tr>
                                                                    <td>{{ $transaction->num }}</td>
                                                                    <td>{{ $transaction->client->name }}</td>
                                                                    <td>{{ $transaction->payed_at }}</td>
                                                                    <td>{{ number_format($transaction->debit) . ' ' . env('MAIN_CURRENCY') }}
                                                                    </td>
                                                                    <td>{{ number_format($transaction->credit) . ' ' . env('MAIN_CURRENCY') }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                 </div>
                                             
                                            @else
                                                <div class="alert alert-solid-danger text-center">
                                                    <h5 class="text-white d-block">{{ trans('general.msg') }}</h5>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-6 -->
        </div>
    </div>
    </div>

@endsection

@push('js')
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris.js/morris.min.js') }}"></script>
    <!--Internal Chart Morris js -->
@endpush
