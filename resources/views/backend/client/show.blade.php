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
                        <span class="card-title">{{ trans('client.data') . ' : ' . $data[0]->client[0]->name }}</span>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex right-content">
                            <div class="pr-1 mb-3 mb-xl-0">
                                <a class="btn btn-success-gradient btn-sm float-left"
                                    href="{{ route('client_balance', $data[0]->client[0]->id) }}" target="_blank">
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
                                <th>{{ $data[0]->client[0]->id }}</th>
                                <th><span class='data'>{{ trans('client.name') }}</span></th>
                                <th>{{ $data[0]->client[0]->name }}</th>

                            </tr>
                            <tr role="column">
                                <th><span class='data'>{{ trans('client.address') }}</span></th>
                                <th>{{ $data[0]->client[0]->address }}</th>

                                <th><span class='data'>{{ trans('client.country') }}</span></th>
                                <th>{{ $data[0]->client[0]->country->name }}</th>

                            </tr>
                            <tr role="column">
                                <th><span class='data'>{{ trans('client.phone') }}</span></th>
                                <th>{{ $data[0]->client[0]->phone }}</th>

                                <th><span class='data'>{{ trans('client.balance') }}</span></th>
                                <th><em>{{ $data[0]->client[0]->totalBalance() }}</em></th>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="alert-secondary">
                                                <tr>
                                                    <td colspan="7">
                                                        <h5 class="py-1 fw-bold R">
                                                            {{ trans('client.balance') }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="wd-2" style="padding: 0;width: 2px; margin: 0">#</td>
                                                    <td><span class='data'>{{ trans('sales.inv_num') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.depit') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.credit') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.balance') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.user') }}</span></td>
                                                    <td><span class='data'>{{ trans('sales.date') }}</span></td>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($data as $da)
                                                  {{--  @if ($da->salesinvs->count() !== 0)
                                                    <tr role="row">
                                                        <td>{{ $loop->iteration }}</td>
                                                        
                                                    <td>
                                                        {{$da->salesinvs[0]->inv_num }}
                                                </td>
                                                <td>{{ $da->salesinvs[0]->formatcurrncy($da->salesinvs[0]->total) }}
                                                </td>
                                                <td>0.00</td>
                                                <td>{{ $da->salesinvs[0]->user->first_name }}</td>
                                                <td>{{ $da->salesinvs[0]->formatdate($da->salesinvs[0]->inv_date) }}</td>
                                                    </tr>
                                                @else

                                                    @endif
                                                    --}}@if ($da->money_transaction->count() != 0)
                                                    <tr role="row">
                                                        <td>{{ $loop->iteration }}</td>
                                                
                                                    <td>{{ $da->money_transaction[0]->num }}
                                                            </td>
                                                            <td>{{ $da->money_transaction[0]->formatcurrncy($da->money_transaction[0]->credit)}}</td>
                                                            <td>{{ $da->money_transaction[0]->formatcurrncy($da->money_transaction[0]->debit) }}
                                                            </td>
                                                            <td> {{$da->money_transaction[0]->current_balance($da->money_transaction[0]->debit,$da->money_transaction[0]->credit)}}</td>
                                                            <td>{{$da->money_transaction[0]->user->first_name}}</td>
                                                            <td>{{ $da->money_transaction[0]->payed_at }}</td>
                                                        </tr>
                                                            @endif

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
