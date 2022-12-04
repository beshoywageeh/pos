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

    <div class="col-xl-12">

        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title mg-b-0">{{ trans('invoice.newinv') }}</h4>
                    </div>
                </div>
            </div>

            <hr>


            <form action="{{ route('sales.store') }}" method="post" id="invoice" >
                @method ('post')@csrf
                <div class="card-body" id="print_area">
                    <input type="hidden" id='last' value="{{ $ex[1] }}">
                    <input type="hidden" id='slogan' value="{{ $data['slogan'] }}">
                    <div class="row">
                        <div class="col-lg-2" id='inv_data'>
                            <label for="inv_num">{{ trans('sales.inv_num') }}</label>
                            <input type="text" id="inv_num" class="form-control form-control-sm" name='inv_num'
                                   readonly>
                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <label class="mg-b-10">{{ trans('client.chooseclient') }}</label>
                            <select class="form-control form-control-sm select2" name="client">
                                <option selected disabled>{{trans('client.chooseclient')}}</option>

                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client')
                            <div class="alert alert-solid-danger mg-b-0 my-2" role="alert">
                                <span class="text-white"><strong>{{$message}}</strong></span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-lg-2">
                            <label for="date">{{trans('invoice.date')}}</label>
                            <input type="date" class="form-control form-control-sm" name='date'
                                   value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-lg-2">
                            <label for="time">{{trans('invoice.time')}}</label>
                            <input value="" id="time" class="form-control form-control-sm"/>
                        </div>
                    </div>
                    <div class='row my-4'>
                        <div class='col-lg-12'>
                            <form method="POST" autocomplete='off'>
                                <input type="text" placeholder="{{trans('invoice.add_product')}}" class="form-control"
                                       id="barcode">
                                <input type="hidden" id="csrf" value="{{csrf_token()}}">
                                <input type="hidden" id="urladd" value="{{route('salesproduct')}}">
                                <span class="alert-error" id="text"></span>
                            </form>

                            <input type="hidden" value="{{route('getinvoicedata')}}" id="getData">
                            <div class="table-responsive my-4">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="table-info">
                                        <th>#</th>
                                        <th>{{trans('invoice.product')}}</th>
                                        <th>{{trans('invoice.quantity')}}</th>
                                        <th>{{trans('product.price')}}</th>
                                        <th>{{trans('invoice.total_product')}}</th>
                                        <th>{{trans('general.delete')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="order_list" name="products_list">
                                    <tr>
                                        <td>1</td>
                                        <td>{{trans('invoice.product')}}</td>
                                        <td>{{trans('invoice.quantity')}}</td>
                                        <td>{{trans('invoice.total')}}</td>
                                        <td><input class="form-control form-control-sm" disabled></td>
                                        <td><a class="btn btn-danger-gradient btn-sm" href="#"><i
                                                    class="fas fa-trash"></i></a></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><label>{{ trans('invoice.discount') }}</label>
                                        </td>
                                        <td colspan="2">
                                            <input class="form-control form-control-sm w-50"
                                                   name='discount' id="discount">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><label>{{ trans('invoice.tax') }}</label>
                                        </td>
                                        <td colspan="2">
                                            <input class="form-control form-control-sm w-25" id="tax_rate"
                                                   name='tax_rate'
                                            >
                                            <span></span>
                                            <input class="form-control form-control-sm w-25" id="tax_value"
                                                   name='tax_value' readonly
                                            >
                                            <span> {{env('MAIN_CURRENCY')}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><label>{{ trans('invoice.totalinvocie') }}</label>
                                        </td>
                                        <td colspan="2">
                                            <input class="form-control form-control-sm w-50" id="total_inv"
                                                   name='total_inv'
                                                   readonly value="0">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            @error('products_list')
                            <div class="alert alert-solid-danger mg-b-0 my-2" role="alert">
                                <span class="text-white"><strong>{{$message}}</strong></span>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=card-footer>
                    <button onclick="document.querySelector('#invoice').submit()" keypress="e.preventDefault()" class="btn btn-success btn-block tx-15 tx-bold" type="submit">{{trans('general.save')}}<i
                        class="mx-2 fa fa-save"></i>
                </button>                    
                </div>
            </form>

        </div>
    </div>
@endsection
@push('js')
<script src="{{URL::asset('assets/js/custom_loop.js')}}"></script>
    
@endpush