@extends('layouts.master') @section('title')
    {{ trans('product.title') }}
    @endsection @section('css')
    <style>
        *{
            text-transform: capitalize !important;
        }
    </style>
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
                    <h4 class="card-title mg-b-0">{{ trans('product.title') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <button data-target="#AddCategory" data-toggle="modal"
                            class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold" tabindex="0"
                            aria-controls="example" type="button">
                            <i class="typcn typcn-document-add"></i><span>{{ trans('product.add') }}</span>
                        </button>
                    </div>
                   <div class="col-md-6">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                            <div class="col-sm-12 col-md-6">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control form-control"
                                        placeholder="Search..." aria-controls="example" />

                                    <span class="input-group-btn">
                                        <button class="btn btn-outline-primary btn-inline" type="submit">
                                            <span class="input-group-btn">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mg-b-0 text-md-nowrap text-center tx-15 tx-bold">
                        <thead>
                            <tr role="row">
                                <th class="wd-2">#</th>
                                <th>{{ trans('product.name') }}</th>
                                <th>{{ trans('product.price') }}</th>
                                <th>{{ trans('product.category') }}</th>
                                <th>{{ trans('product.note') }}</th>
                                <th style="width: 1rem;">{{ trans('product.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr role="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->notes }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-gray-700" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button"><i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <button class="dropdown-item bg-danger text-white tx-15"
                                                    data-target="#DeleteProduct{{ $product->id }}" data-toggle="modal"
                                                    aria-controls="example" type="button">
                                                    <i class="typcn typcn-delete mr-2"></i>{{ trans('product.delete') }}
                                                </button>
                                                <button class="dropdown-item bg-warning text-white tx-15"
                                                    data-target="#EditProduct{{ $product->id }}" data-toggle="modal"
                                                    aria-controls="example" type="button">
                                                    <i class="typcn typcn-edit mr-2"></i> {{ trans('product.edit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @include('backend.Products.edit') @include('backend.Products.delete') @empty
                                <tr>
                                    <td class="text-center" colspan="6">{{ trans('product.msg') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer">
                {{$products->links()}}

            </div>
        </div>
        @include('backend.Products.create')
    </div>
    @endsection @section('js')

@endsection
