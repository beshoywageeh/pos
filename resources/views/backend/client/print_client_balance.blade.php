@extends('layouts.master_print') @section('title')
    {{ trans('general.print') }}
@endsection
@section('css')
<style>
    *{
        background-color:white;
        margin:0;
        padding: 0;
    }
    #invoice{
        border:none;
        box-shadow: none;
        margin:auto;
    }
</style>
@endsection
<!-- Content Header (Page header) -->
@section('content')
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20" id="invoice">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <h5 class="card-title">{{$data['name']}}</h5>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex right-content">
                            <div class="pr-1 mb-3 mb-xl-0">
                                <span>تاريخ الطباعه : </span><span>{{\Carbon\Carbon::now()->format('Y-m-d')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="client_data">
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-6">
                            <span class='text_data'>{{trans('client.name')}} : {{$client->name}}</span>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <span class='text_data'>{{trans('client.phone')}} : {{$client->phone}}</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-12">
                            <span class='text_data'>{{trans('client.address')}} : {{$client->address}}</span>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table  class="table key-buttons text-md-nowrap report_table text-center" style="width: 98%">
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
                                <td>{{$sale->inv_num}}
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
            <div class='card-footer'>
                <h5 class='total'>{{trans('client.balance')}} : <em>{{$client->totalBalance()}}</em> {{env('MAIN_CURRENCY')}}</h5>


            </div>
        </div>

    </div>

@endsection @section('js')
<script>
    window.print();
</script>
@endsection
