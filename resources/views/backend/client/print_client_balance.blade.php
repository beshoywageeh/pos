@extends('layouts.master_print') @section('title')
    {{ trans('general.print') }}
@endsection
@push('css')
    <link href="{{ URL::asset('assets/css/custom_loop_print.css') }}" rel="stylesheet">
@endpush
<!-- Content Header (Page header) -->
@section('content')
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20" id="print">
            <div class="card-header pb-0">
                <div class="row">
                    <table id='client_data' class='table text-center table-bordered'>
                        <tr>
                            <th colspan="3">{{ $data['name'] }}</th>
                            <th colspan='3'>
                                <span>تاريخ الطباعه : </span><span>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</span>
                            </th>
                        </tr>
                        <tr>
                            <td colspan='6'>{{ trans('client.details') }}</td>
                        </tr>
                        <tr>
                            <td> {{ trans('client.name') }} :</td>
                            <td>
                                {{ $client->name }}
                            </td>
                            <td>{{ trans('client.phone') }} :</td>
                            <td>
                                {{ $client->phone }}
                            </td>
                            <td>
                                {{ trans('client.address') }} : </td>
                            <td>{{ $client->address }}

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table  table-bordered text-center" style="width: 98%">
                        <thead>
                            <tr>
                                <th class="wd-2" style="padding: 0;width: 2px; margin: 0">#</th>
                                <th><span class='data'>{{ trans('sales.inv_num') }}</span></th>
                                <th><span class='data'>{{ trans('sales.total') }}</span></th>
                                <th><span class='data'>{{ trans('sales.user') }}</span></th>
                                <th><span class='data'>{{ trans('sales.date') }}</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                                <tr role="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sale->inv_num }}
                                    </td>
                                    <td>{{ $sale->formatcurrncy() }} {{ env('MAIN_CURRENCY') }}</td>
                                    <td>{{ $sale->user->first_name }}</td>
                                    <td>{{ $sale->formatdate() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">{{ trans('client.report_msg') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class='card-footer'>
                <h5 class='total'>{{ trans('client.balance') }} : <em>{{ $client->totalBalance() }}</em>
                    {{ env('MAIN_CURRENCY') }}</h5>


            </div>
        </div>

    </div>
    @endsection @section('js')
    <script>
        window.print();
    </script>
@endsection
