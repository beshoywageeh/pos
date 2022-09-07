@extends('layouts.master') @section('title')
    {{ trans('invoice.newinv') }}
@endsection
@section('css')
    @livewireStyles
@endsection
<!-- Content Header (Page header) -->
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


            <form action="{{ route('sales.store') }}" method="post">
                @method ('post')@csrf
                <div class="card-body" id="print_area">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="text" id='last' hidden value="{{ $ex[1] }}">
                    <div class="row">
                        <div class="col-lg-2" id='inv_data'>
                            <label for="inv_num">{{ trans('sales.inv_num') }}</label>
                            <input type="text" id="inv_num" class="form-control form-control-sm" name='inv_num' readonly>
                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <label class="mg-b-10">{{ trans('client.chooseclient') }}</label>
                            <select class="form-control form-control-sm select2" name="client">
                                <option label="Choose one">
                                </option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="date">{{trans('invoice.date')}}</label>
                            <input type="date" class="form-control form-control-sm" name='date'
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-lg-2">
                            <label for="time">{{trans('invoice.time')}}</label>
                            <input value="" id="time" class="form-control form-control-sm" />
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <livewire:salesinv />

                        </div>
                        <div class='col-lg-6 my-5'>
                            <div class="col-lg -12">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('invoice.product')}}</th>
                                            <th>{{trans('invoice.quantity')}}</th>
                                            <th>{{trans('product.price')}}</th>
                                            <th>{{trans('product.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order_list" name="products_list">

                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 d-flex justify-content-center align-items-center text-center">
                                    <label style="width: 50%;">{{ trans('invoice.totalinvocie') }}</label>
                                    <input class="form-control form-control-sm mx-2" id="total_inv" name='total_inv'
                                        readonly>
                                    <span class='d-inline'>{{ env('MAIN_CURRENCY') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=card-footer>
                    <button class="btn btn-success tx-15 tx-bold" type="submit">حفظ<i class="mr-2 fa fa-save"></i></button>
                </div>
            </form>


        </div>
    </div>
    @include('backend.products.create')
@endsection
@section('js')
    @livewireScripts
    <script src="{{URL::asset('assets/js/custom_loop.js')}}"></script>

@endsection
