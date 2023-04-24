@extends('layouts.master')
@section('title')
    {{ trans('product.title') }}
@endsection
@push('css')
@endpush
<!-- Content Header (Page header) -->
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('product.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('product.main') }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('backend.msg')
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header d-flex">
                <div class="col-sm-12 col-md-10 left-content">
                    <h4 class="card-title mg-b-0">{{ trans('product.title') }}</h4>
                </div>
                <div class=" col-sm-12 col-md-2">
                    <a href="{{ route('product_create') }}" class="btn btn-success btn-block"><i
                            class="fa fa-plus mx-2"></i><span>{{ trans('general.add') }}</span></a>
                </div>
            </div>
            <div class="card-body py-0">
                <div class="table-responsive text-center ">
                    <table id="example2" class="table table-striped table-bordered"
                        style="padding: 0; width:98%">
                        <thead class="thead-light">
                            <tr>
                                <th class="wd-2" style="padding: 0;wdith:4px;">#</th>
                                <th>{{ trans('product.barcode') }}</th>
                                <th>{{ trans('product.name') }}</th>
                                <th>{{ trans('product.category') }}</th>
                                <th>{{ trans('product.purchase_price') }}</th>
                                <th>{{ trans('product.sales_price') }}</th>
                                <th style="width: 1rem;">{{ trans('product.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr role="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->barcode }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->sales_price }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">{{ trans('product.actions') }}<i
                                                    class="fas fa-caret-down mx-2"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item delete"
                                                    data-target="#DeleteProduct{{ $product->id }}" data-toggle="modal"
                                                    aria-controls="example" type="button">
                                                    <i
                                                        class="fas fa-trash fa-1x mx-2 text-danger"></i>{{ trans('general.delete') }}
                                                </a>
                                                <button class="dropdown-item" data-target="#EditProduct{{ $product->id }}"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                    <i class="fas fa-pen mx-2 text-warning"></i>
                                                    {{ trans('general.edit') }}
                                                </button>
                                                <button class="dropdown-item" data-target="#EditProduct{{ $product->id }}"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                    <i class="fas fa-info mx-2 text-info"></i> {{ trans('product.info') }}
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('backend.Products.edit') @include('backend.Products.delete')
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">{{ trans('product.msg') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('js')
@endpush
