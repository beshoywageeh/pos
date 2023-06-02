@extends('layouts.master') @section('title')
    {{ trans('invoice.newinv') }}
@endsection
@push('css')
    <style>
        #invoice_list{
            height:20%;
            overflow:scroll;
        }
    </style>
@endpush
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('sales.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">{{ trans('general.main') }}
                        </li>
                        <li class="breadcrumb-item active">{{ trans('invoice.newinv') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    @include('backend.msg')

    <div class="container-fluid">
        <div class="col-xl-12 text-center justify-center align-middle">
            <div class="card">
                <div class="card-header">
                    @include('backend.invoice.sales.Approve_inv')
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">

                            <form method="POST">
                                @method('POST')
                                <button onclick="approve_invoice_data()" data-target="#approve_invoice"
                                        data-toggle="modal"
                                        tabindex="0" aria-controls="example" type="button"
                                        class="btn btn-success btn-block btn-sm tx-15 tx-bold py-2">{{ trans('general.save') }}
                                    <i
                                        class="mx-2 fa fa-save"></i></button>
                                <input type="hidden" id="csrf_get" value="{{ csrf_token() }}">
                                <input type="hidden" id="inv_id" value="{{ $data['sales_invoice']->id }}">
                                <input type="hidden" name="inv_num" value="{{ $data['sales_invoice']->inv_num }}">

                                <input type="hidden" value="{{ route('salesinvoice_getapprovedata') }}"
                                       id="approve_link">

                            </form>
                        </div>

                    </div>
                </div>
                <div class="card-body" id="print_area">
                    <div class="row client_data">
                        <input type="hidden" name="id" id="sales_id" value="{{ $data['sales_invoice']->id }}">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td>{{ trans('invoice.id') }}</td>
                                <td>{{ $data['sales_invoice']->id }}</td>
                                <td>{{ trans('invoice.client_name') }}</td>
                                <td>{{ $data['sales_invoice']->client->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('invoice.client_phone') }}</td>
                                <td>{{ $data['sales_invoice']->client->phone }}</td>
                                <td>{{ trans('invoice.client_address') }}</td>
                                <td>{{ $data['sales_invoice']->client->address }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class='row my-4'>
                        <div class='col-lg-12'>
                            <form method="POST" autocomplete='off'>
                                @method ('POST')@csrf

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">

                                        <select class="form-control select2" name="product" id="product_search">
                                            <option value="no" selected disabled> {{ trans('invoice.add_product') }}
                                            </option>
                                            @foreach ($data['product'] as $product)
                                                <option value="{{ $product->barcode }}">{{ $product->barcode }} -
                                                    {{ $product->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-6 col-sm-12"><input type="number"
                                                                           placeholder="{{ trans('invoice.quantity') }}"
                                                                           class="form-control" id="quantity"
                                                                           value="1"></div>
                                </div>
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <input type="hidden" id="urladd" value="{{ route('salesinvoice_getproduct') }}">
                            </form>
                            <form method="post">
                                <input type="hidden" id="csrf_get" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{ route('salesinvoice_getinvoicedata') }}" id="getData">
                            </form>
                                <table class="table table-sm table-bordered mt-2" id="invoice_list">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('invoice.product') }}</th>
                                        <th>{{ trans('invoice.quantity') }}</th>
                                        <th>{{ trans('product.price') }}</th>
                                        <th>{{ trans('invoice.total_product') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="order_list" name="products_list">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="{{ URL::asset('assets/js/sales_invoice.js') }}"></script>

@endpush
