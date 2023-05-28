@extends('layouts.master') @section('title')
    {{ trans('product.title') }}
    @endsection @section('css')
@endsection
<!-- Content Header (Page header) -->
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('product.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product_index') }}">{{ trans('product.title') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('general.main') }}</li>
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
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between col-sm-12 col-md-4">
                        <h4 class="card-title mg-b-0">{{ trans('general.add') }}</h4>
                    </div>
                </div>
                <form action="{{ route('product_update') }}" method="POST" autocomplete="off" id="product_data">
                    @csrf
                    <input type="hidden" name='id'value='{{ $product->id }}'>
                    <div class="card-body">
                        <fieldset>
                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label for="barcode">{{ trans('product.barcode') }}</label>
                                    <span for="">{{ trans('product.barcode_msg') }}</span>

                                    <input type="text" name="barcode" id="barcode" value="{{ $product->barcode }}"
                                        disabled class="form-control @error('barcode') is-invalid @enderror"
                                        placeholder="{{ trans('product.barcode') }}">
                                    @error('barcode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <img class='img-responsive'
                                        src="data:image/png;base64,{{ DNS1D::getBarcodePNG($product->barcode, 'C39+', 2, 70, [1, 1, 1], true) }}"
                                        alt="barcode" />
                                </div>
                            </div>
                        </fieldset>



                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="arabic">{{ trans('product.arabicname') }}</label>
                                <input type="text" name="name" id="arabic"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value='{{ $product->getTranslation('name', 'ar') }}'
                                    placeholder="{{ trans('product.arabicname') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="english">{{ trans('product.englishname') }}</label>
                                <input type="text" name="name_en" id="english"
                                    class="form-control @error('name_en') is-invalid @enderror"
                                    value='{{ $product->getTranslation('name', 'ar') }}'
                                    placeholder="{{ trans('product.englishname') }}">
                                @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="category">{{ trans('product.category') }}</label>
                                <select id="category_id"
                                    class="form-control select2 @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option selected disabled>{{ trans('product.chcat') }}</option>
                                    @foreach ($cats as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="purchase_price">{{ trans('product.purchase_price') }}</label>
                                <input type="text" name="purchase_price" id="purchase_price"
                                    class="form-control @error('purchase_price') is-invalid @enderror"
                                    placeholder="{{ trans('product.purchase_price') }}"
                                    value='{{ $product->purchase_price }}'>
                                @error('purchase_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="purchase_unit">{{ trans('product.purchase_unit') }}</label>
                                <input type="text" name="purchase_unit" id="purchase_unit"
                                    class="form-control @error('purchase_unit') is-invalid @enderror"
                                    placeholder="{{ trans('product.purchase_unit') }}"
                                    value="{{ $product->purchase_unit }}">
                                @error('purchase_unit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="sales_price">{{ trans('product.sales_price') }}</label>
                                <input type="text" name="sales_price" id="sales_price"
                                    class="form-control @error('sales_price') is-invalid @enderror"
                                    value="{{ $product->sales_price }}" placeholder="{{ trans('product.sales_price') }}">
                                @error('sales_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="sales_unit">{{ trans('product.sales_unit') }}</label>
                                <input type="text" name="sales_unit" id="sales_unit"
                                    class="form-control @error('sales_unit') is-invalid @enderror"
                                    value="{{ $product->sales_unit }}" placeholder="{{ trans('product.sales_unit') }}">
                                @error('sales_unit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </diV>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="opening_balance">{{ trans('product.opening_balance') }}</label>
                                    <input type='number'
                                        class="form-control @error('opening_balance') is-invalid @enderror"
                                        name="opening_balance" value="{{ $product->opening_balance }}" disabled
                                        placeholder="{{ trans('product.opening_balance') }}" id="opening_balance">
                                    @error('opening_balance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="img">{{ trans('product.img') }}</label>
                                    <input type="file" accept="image/*"
                                        class="form-control @error('img') is-invalid @enderror" name="img"
                                        placeholder="{{ trans('product.img') }}">
                                    @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Note">{{ trans('product.note') }}</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="Note" rows="5"
                                        placeholder="{{ trans('product.note') }}">{{ $product->notes }}</textarea>
                                    @error('notes')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn ripple btn-primary" type="submit"
                            id='submit_proudct'>{{ trans('general.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="{{ URL::asset('assets/js/product_custom.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush
