@extends('layouts.master') @section('title')
    {{ trans('invoice.newinv') }}
@endsection
@section('css')
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoice.newinv') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('sales.main') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12 text-center justify-center align-middle">

        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="card-title mg-b-0">{{ trans('invoice.newinv') }}</h3>
                    </div>
                    <div class="col-lg-6">
                        <button onclick="document.querySelector('#invoice').submit()" keypress="e.preventDefault()"
                            class="btn btn-success btn-block btn-sm tx-15 tx-bold py-2"
                            type="submit">{{ trans('general.save') }}<i class="mx-2 fa fa-save"></i></button>
                    </div>
                </div>
            </div>
            <hr>
            <form action="{{ route('salesinvoice_store') }}" method="post" id="invoice">
                @method ('post')@csrf
                <div class="card-body" id="print_area">
                    <div class="client_data">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="input-group input-group-sm">
                                    <label for="id" class='input-group-text'>{{ trans('invoice.id') }}</label>
                                    <input type="id" class="form-control" id="inv_id" readonly
                                        value="{{ $data['sales_invoice']->id }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group input-group-sm">
                                    <label for="name"
                                        class="input-group-text">{{ trans('invoice.client_name') }}</label>
                                    <input value="{{ $data['sales_invoice']->client->name }}" readonly id="name"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group input-group-sm">
                                    <label for="client_phone"
                                        class='input-group-text'>{{ trans('invoice.client_phone') }}</label>
                                    <input type="client_phone" class="form-control" readonly
                                        value="{{ $data['sales_invoice']->client->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group input-group-sm">
                                    <label for="address"
                                        class="input-group-text">{{ trans('invoice.client_address') }}</label>
                                    <input value="{{ $data['sales_invoice']->client->address }}" readonly id="address"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row my-4'>
                        <div class='col-lg-12'>
                            <form method="POST" autocomplete='off'>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12"> <input type="text"
                                            placeholder="{{ trans('invoice.add_product') }}" class="form-control"
                                            id="barcode" autofocus></div>
                                    <div class="col-lg-6 col-sm-12">
                                        <select class="form-control select2" name="product" id="product_search">
                                            <option selected disabled>{{ trans('salesinv_search') }}</option>
                                            @foreach ($data['product'] as $product)
                                                <option value="{{ $product->id }}">{{ $product->barcode }} -
                                                    {{ $product->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <input type="hidden" id="urladd" value="{{ route('salesinvoice_getproduct') }}">

                                <span class="alert-error" id="text"></span>

                            </form>
<form method="post">
    <input type="hidden" id="csrf_get" value="{{ csrf_token() }}">

    <input type="hidden" value="{{ route('salesinvoice_getinvoicedata') }}" id="getData">

</form>
                            <div class="table-responsive my-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-info">
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
                                            <td><a class="text-danger" href="#"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            @error('products_list')
                                <div class="alert alert-solid-danger mg-b-0 my-2" role="alert">
                                    <span class="text-white"><strong>{{ $message }}</strong></span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <label>{{ trans('invoice.discount') }}</label>

                            <div class="discount-type">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="discount" id="rate"
                                        value="rate">
                                    <label class="form-check-label" for="rate">
                                        {{ trans('invoice.discount_rate') }}
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="discount" id="value"
                                        value="value">
                                    <label class="form-check-label" for="value">
                                        {{ trans('invoice.discount_value') }}
                                    </label>

                                </div>
                            </div>
                            <div class="input-group input-group-sm">
                                <input class="form-control " name='tax_rate' id="tax_rate">
                                <input class="form-control" id="tax_value" name='tax_value' readonly>
                                <span class='input-group-text'> {{ env('MAIN_CURRENCY') }}</span>
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <label>{{ trans('invoice.tax') }}</label>

                            <div class="input-group input-group-sm">
                                <input class="form-control" id="tax_rate" name='tax_rate'>
                                <input class="form-control" id="tax_value" name='tax_value' readonly>
                                <span class='input-group-text'> {{ env('MAIN_CURRENCY') }}</span>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>{{ trans('invoice.totalinvocie') }}</label>

                            <div class="input-group input-group-sm">
                                <input class="form-control" id="total_inv" name='total_inv' readonly value="0">
                                <span class='input-group-text'> {{ env('MAIN_CURRENCY') }}</span>
                            </div>
                        </div>



                    </div>
                </div>

        </div>

        </form>

    </div>
    </div>
@endsection
@push('js')
    <script src="{{ URL::asset('assets/js/custom_loop.js') }}"></script>
@endpush
