@extends('layouts.master') @section('title')
    {{ trans('client.data') }}
@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between no">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('client.title') }}</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('client.data') }}</span>
        </div>

    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <span class="card-title">{{ trans('client.data') . ' : ' . $client->name }}</span>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex right-content">
                            <div class="pr-1 mb-3 mb-xl-0">
                                <a class="btn btn-success-gradient btn-sm float-left"
                                    href="{{ route('client_balance', $client->id) }}" target="_blank">
                                    <i
                                        class="fas fa-print ml-1"></i>{{ trans('general.print') . ' ' . trans('client.balance') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered">
                        <thead class="alert-secondary">
                            <tr>
                                <th colspan="4">
                                    <h5 class="py-1 fw-bold">بيانات العميل</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="column">
                                <th><span class='data'>{{ trans('client.code') }}</span></th>
                                <th>{{ $client->id }}</th>
                                <th><span class='data'>{{ trans('client.name') }}</span></th>
                                <th>{{ $client->name }}</th>

                            </tr>
                            <tr role="column">
                                <th><span class='data'>{{ trans('client.address') }}</span></th>
                                <th>{{ $client->address }}</th>

                                <th><span class='data'>{{ trans('client.country') }}</span></th>
                                <th>{{ $client->country->name }}</th>

                            </tr>
                            <tr role="column">
                                <th><span class='data'>{{ trans('client.phone') }}</span></th>
                                <th>{{ $client->phone }}</th>

                                <th><span class='data'>{{ trans('client.balance') }}</span></th>
                                <th><em>{{ $client->totalBalance() }}</em> {{ env('MAIN_CURRENCY') }}</th>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="alert-secondary">
                                                <tr>
                                                    <td colspan="5">
                                                        <h5 class="py-1 fw-bold R">
                                                            {{ trans('client.balance') }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="wd-2" style="padding: 0;width: 2px; margin: 0">#</td>
                                                    <td><span class='data'>{{ trans('sales.inv_num') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.total') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.user') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.date') }}</span></td>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($sales as $sale)
                                                    <tr role="row">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><a
                                                                href='{{ route('salesinvoice_show', ['id' => $sale->id]) }}'>{{ $sale->inv_num }}</a>
                                                        </td>
                                                        <td>{{ $sale->formatcurrncy() }} {{ env('MAIN_CURRENCY') }}</td>
                                                        <td>{{ $sale->user->first_name }}</td>
                                                        <td>{{ $sale->formatdate() }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="5">
                                                            {{ trans('client.report_msg') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
