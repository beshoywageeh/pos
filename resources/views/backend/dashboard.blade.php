@extends('layouts.master')
@push('css')
@endpush
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('general.welcome') }} <bdi> {{ $data['name'] }}</bdi></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <span>{{ trans('client.title') }}</span>
                        <h4>{{ $data['clients'] }}</h4>
                    </div>
                    <div class="icon"><i class="fa fa-users fa-3x"></i></div>

                    <a class="small-box-footer" href="{{ route('client_index') }}"
                        class="text-primary">{{ trans('client.title') }}</a>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <span>{{ trans('general.tsales') }}</span>
                        <h4>{{ number_format($data['total_sales']) . ' ' . env('MAIN_CURRENCY') }}</h4>
                    </div>
                    <div class="icon"><i class="fas fa-shopping-cart fa-3x"></i></div>

                    <a class="small-box-footer" {{ route('salesinvoice_index') }}"
                        class="text-primary">{{ trans('general.tsales') }}</a>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3 col-md-6 col-12">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <span>{{ trans('general.income') }}</span>
                        <h4>{{ number_format($data['income']) . ' ' . env('MAIN_CURRENCY') }}</h4>
                    </div>
                    <div class="icon"><i class="fas fa-download fa-3x"></i></div>

                    <a class="small-box-footer" href="#" class="text-primary">{{ trans('general.income') }}</a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <span>{{ trans('general.expenses') }}</span>
                        <h4>{{ number_format($data['expenses']) . ' ' . env('MAIN_CURRENCY') }}</h4>
                    </div>
                    <div class="icon"><i class="fas fa-upload fa-3x"></i></div>

                    <a class="small-box-footer" href="#" class="text-primary">{{ trans('general.expenses') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
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
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title p-3">
                            {{ trans('general.lastten') }}
                        </h3>
                        <!-- Tabs -->
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class='nav-item'><a href="#client" class="nav-link" data-toggle="tab">
                                    {{ trans('client.title') }}</a></li>
                            <li class='nav-item'><a href="#sale_invoice" class="nav-link"
                                    data-toggle="tab">{{ trans('invoice.invoice') }}</a></li>
                            <li class='nav-item'><a href="#money_transaction" class="nav-link active"
                                    data-toggle="tab">{{ trans('general.money_transaction') }}</a>
                            </li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="tab-pane" id="client">
                                <table class="table table-sm">
                                    <thead class='alert-success'>
                                        <tr>
                                            <th>{{ trans('client.code') }}</th>
                                            <th>{{ trans('client.name') }}</th>
                                            <th>{{ trans('client.phone') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data['clientlast'] as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->phone }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">{{ trans('general.msg') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="sale_invoice">

                                <table class="table table-sm">
                                    <thead class='alert-success'>
                                        <tr>
                                            <th>{{ trans('sales.inv_num') }}</th>
                                            <th>{{ trans('client.name') }}</th>
                                            <th>{{ trans('sales.date') }}</th>
                                            <th>{{ trans('sales.total') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data['saleslast'] as $sale)
                                            <tr>
                                                <td>{{ $sale->inv_num }}</td>
                                                <td>{{ $sale->client->name }}</td>
                                                <td>{{ $sale->inv_date }}</td>
                                                <td>{{ number_format($sale->total) . ' ' . env('MAIN_CURRENCY') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">{{ trans('general.msg') }}</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane active" id="money_transaction">

                                <table class="table table-sm">
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
                                        @forelse ($data['money_treasary'] as $transaction)
                                            <tr>
                                                <td>{{ $transaction->num }}</td>
                                                <td>{{ $transaction->client->name }}</td>
                                                <td>{{ $transaction->payed_at }}</td>
                                                <td>{{ number_format($transaction->debit) . ' ' . env('MAIN_CURRENCY') }}
                                                </td>
                                                <td>{{ number_format($transaction->credit) . ' ' . env('MAIN_CURRENCY') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">{{ trans('general.msg') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
