@extends('layouts.master') @section('title')
    {{ trans('client.info') }}
@endsection
<!-- Content Header (Page header) -->
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('client.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('client_index') }}">{{ trans('general.main') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('client.info') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <!-- breadcrumb -->

    @include('backend.msg')

    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex align-items-center">

                        <div class="col-sm-12 col-md-4 text-center">
                            <a class="btn btn-success btn-block" href="{{ route('client_balance', $data[0]->client->id) }}"
                                target="_blank">
                                <i
                                    class="fas fa-print ml-1"></i>{{ trans('general.print') . ' ' . trans('client.balance') }}
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-8 text-center">
                            <h3 class="card-title alert alert-info">
                                {{ trans('client.info') . ' : ' . $data[0]->client->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-center table-bordered table-sm">
                        <thead class="alert-secondary">
                            <tr>
                                <th colspan="4">
                                    <h5 class=""> {{ trans('client.info') }}</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="column">
                                <th><span>{{ trans('client.code') }}</span></th>
                                <th>{{ $data[0]->client->code }}</th>
                                <th><span>{{ trans('client.name') }}</span></th>
                                <th>{{ $data[0]->client->name }}</th>

                            </tr>
                            <tr role="column">
                                <th><span>{{ trans('client.address') }}</span></th>
                                <th>{{ $data[0]->client->address }}</th>

                                <th><span>{{ trans('client.country') }}</span></th>
                                <th>{{ $data[0]->client->country->name }}</th>

                            </tr>
                            <tr role="column">
                                <th><span>{{ trans('client.phone') }}</span></th>
                                <th>{{ $data[0]->client->phone }}</th>

                                <th><span class='data'>{{ trans('client.balance') }}</span></th>
                                <th><em>{{ $data[0]->client->totalBalance() }}</em></th>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <table class="table table-bordered text-center table-sm">
                                        <thead class="alert-secondary">
                                            <tr>
                                                <th colspan="7">
                                                    <h5 class="py-1 fw-bold R">
                                                        {{ trans('client.balance') }}</h5>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th><span>{{ trans('sales.user') }}</span></th>
                                                <th><span>{{ trans('sales.inv_num') }}</span></th>
                                                <th><span>{{ trans('sales.date') }}</span></th>
                                                <th><span>{{ trans('sales.credit') }}</span></th>
                                                <th><span>{{ trans('sales.depit') }}</span></th>
                                                <th><span>{{ trans('sales.balance') }}</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $transaction)
                                                <tr role="row">
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>{{ $transaction->user->first_name }}</td>
                                                    <td>{{ $transaction->num }}
                                                    </td>
                                                    <td>{{ $transaction->payed_at }}</td>
                                                    <td>{{ $transaction->formatcurrncy($transaction->credit) }}
                                                    </td>
                                                    <td>{{ $transaction->formatcurrncy($transaction->debit) }}
                                                    </td>
                                                    <td>{{ $transaction->current_balance() }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="5">
                                                        {{ trans('client.report_msg') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">{{ trans('general.total') }}</th>
                                                <th>{{ $data[0]->total_credit() }}</th>
                                                <th>{{ $data[0]->total_debit() }}</th>

                                                <th>{{ $data[0]->client->totalBalance() }}</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
