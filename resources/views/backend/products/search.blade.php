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
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                    <div class="col-sm-6 col-md-12">
                        <div id="example_filter" class="dataTables_filter">
                            <input type="search" name="search" class="form-control form-control-sm" placeholder="Search..."
                                          aria-controls="example" />
                        </div>
                                          <button class="btn btn-outline-primary btn-inline" type="submit">بحث</button>

                        
                    </div>
                </form>
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr role="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>

                            </tr>
                           

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection @section('js')
@endsection
