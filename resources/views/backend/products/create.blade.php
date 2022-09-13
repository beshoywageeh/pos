@extends('layouts.master') @section('title')
    {{ trans('product.title') }}
@endsection @section('css')

@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('product.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('product.main') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{ trans('general.add') }}</h4>
                </div>
            </div>
            <hr>
            <form action="{{route('product.store')}}" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="form-group col-sm-6">
                            <input type="hidden" id='slogan'
                                   value="{{$data['slogan']}}">
                            <label for="barcode">{{trans('product.barcode')}}</label>
                            <span for="">{{trans('product.barcode_msg')}}</span>
                            <input type="text" name="barcode" id="barcode"
                                   class="form-control @error('barcode') is-invalid @enderror"
                                   placeholder="{{trans('product.barcode')}}">
                            @error('barcode')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <img class="barcode img-responsive" id="code">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="arabic">{{trans('product.arabicname')}}</label>
                            <input type="text" name="name" id="arabic"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="{{trans('product.arabicname')}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="english">{{trans('product.englishname')}}</label>
                            <input type="text" name="name_en" id="english"
                                   class="form-control @error('name_en') is-invalid @enderror"
                                   placeholder="{{trans('product.englishname')}}">
                            @error('name_en')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="category">{{trans('product.category')}}</label>
                            <select id="category_id"
                                    class="form-control select2 @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                <option selected disabled>{{trans('product.chcat')}}</option>
                                @foreach($cats as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="purchase_price">{{trans('product.purchase_price')}}</label>
                            <input type="text" name="purchase_price" id="purchase_price"
                                   class="form-control @error('purchase_price') is-invalid @enderror"
                                   placeholder="{{trans('product.purchase_price')}}">
                            @error('purchase_price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="purchase_unit">{{trans('product.purchase_unit')}}</label>
                            <input type="text" name="purchase_unit" id="purchase_unit"
                                   class="form-control @error('purchase_unit') is-invalid @enderror"
                                   placeholder="{{trans('product.purchase_unit')}}">
                            @error('purchase_unit')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="sales_price">{{trans('product.sales_price')}}</label>
                            <input type="text" name="sales_price" id="sales_price"
                                   class="form-control @error('sales_price') is-invalid @enderror"
                                   placeholder="{{trans('product.sales_price')}}">
                            @error('sales_price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="sales_unit">{{trans('product.sales_unit')}}</label>
                            <input type="text" name="sales_unit" id="sales_unit"
                                   class="form-control @error('sales_unit') is-invalid @enderror"
                                   placeholder="{{trans('product.sales_unit')}}">
                            @error('sales_unit')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </diV>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="opening_balance">{{trans('product.opening_balance')}}</label>
                                <input type='number' class="form-control @error('notes') is-invalid @enderror" name="opening_balance"
                                       placeholder="{{trans('product.opening_balance')}}" id="opening_balance">
                                @error('opening_balance')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="img">{{trans('product.img')}}</label>
                                <input type="file" accept="image/*"
                                       class="form-control @error('notes') is-invalid @enderror" name="img"
                                       placeholder="{{trans('product.img')}}"></input>
                                @error('img')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="Note">{{trans('product.note')}}</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" name="notes"
                                      id="Note"
                                      rows="5" placeholder="{{trans('product.note')}}"></textarea>
                            @error('notes')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="card-footer">
                    <button class="btn ripple btn-primary" type="submit">{{trans('general.save')}} </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="{{URL::asset('assets/js/custom_loop_product.js')}}"></script>
@endsection
