@extends('layouts.master')
@section('title')
    {{ trans('invoice.invoice_display') }}
@endsection
@push('css')

@endpush
<!-- Content Header (Page header) -->
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between no" id="head">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoice.sales_inv') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('invoice.invoice_display') }}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <a class="btn btn-primary float-left mt-3 mr-2 print" href="{{route('printinvoice',['id'=>$inv->id])}}"target='_blank'>
                    <i class="mdi mdi-printer ml-1"></i>{{ trans('general.print') }}
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content')

    @include('backend.msg')

    <div class="row row-sm" id='invoice'>
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">{{ $data['name']}} | {{$inv->client->name}}</h1>
                            <div class="billed-from">
                                <h6>{{ $data['name']}}</h6>
                                <p>{{ $data['address'] }}<br>
                                    Tel No: {{ $data['phone'] }}<br>
                                </p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">Billed To</label>
                                <div class="billed-to">
                                    <h6>{{ $inv->client->name }}</h6>
                                    <p>{{ $inv->client->address }}<br>
                                        Tel No: {{ $inv->client->phone }}<br>
                                        Country: {{ $inv->client->country->name }}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">Invoice Information</label>
                                <p class="invoice-info-row"><span>Invoice No</span> <span>{{ $inv->inv_num }}</span></p>
                                <p class="invoice-info-row"><span>Project ID</span> <span>{{ $inv->id }}</span></p>
                                <p class="invoice-info-row"><span>Date Created:</span> <span>{{ $inv->inv_date }}</span>
                                </p>
                                <p class="invoice-info-row"><span>Due Date:</span> <span>November 30, 2017</span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40 invoice_data">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Type</th>
                                    <th class="wd-40p">Description</th>
                                    <th class="tx-center">QNTY</th>
                                    <th class="tx-right">Unit Price</th>
                                    <th class="tx-right">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($inv->products as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td class="tx-left">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium doloremque laudantium, totam rem aperiam...
                                        </td>
                                        <td class="tx-center">
                                            {{ \App\Models\product_salesinv::where('salesinv_id', $inv->id)->where('product_id', $item->id)->pluck('quantity')->first() }}
                                        </td>
                                        <td class="tx-right">{{ $item->sales_price }} {{ env('MAIN_CURRENCY') }}</td>

                                        <td class="tx-right">{{ number_format($item->sales_price * \App\Models\product_salesinv::where('salesinv_id', $inv->id)->where('product_id', $item->id)->pluck('quantity')->first())}} {{ env('MAIN_CURRENCY') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13"></label>
                                            <p></p>
                                        </div><!-- invoice-notes -->
                                    </td>
                                    <td class="tx-right">Sub-Total</td>
                                    <td class="tx-right" colspan="2">{{ number_format($inv->total) }}
                                        {{ env('MAIN_CURRENCY') }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Tax</td>
                                    <td class="tx-right" colspan="1">{{ $inv->tax_rate }} % <i
                                            class="fa fa-arrow-right"></i></td>
                                    <td class="tx-right" colspan="1">{{ number_format($inv->tax_value) }}
                                        {{ env('MAIN_CURRENCY') }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Discount</td>
                                    <td class="tx-right" colspan="2">-{{ $inv->discount }}
                                        {{ env('MAIN_CURRENCY') }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                                    <td class="tx-right" colspan="2">
                                        <h4 class="tx-primary tx-bold">{{ env('MAIN_CURRENCY') }}</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
@endsection @push('js')
@endpush
