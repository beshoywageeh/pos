@extends('layouts.master') @section('title') {{trans('product.title')}} @endsection @section('css') @endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('product.title')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('product.main')}}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{trans('product.title')}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1>{{$category->name}}</h1>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="example_filter" class="dataTables_filter">
                            <label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="example" /></label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-md-nowrap text-center tx-15 tx-bold">
                        <thead>
                        <tr >
                            <th class="wd-2">#</th>
                            <th>{{trans('product.name')}}</th>
                            <th>{{trans('product.note')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr role="row">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->notes == true ? $product->notes : trans('product.notemsg')}}</td>
                                                           </tr>
                             @empty
                            <tr>
                                <td class="text-center" colspan="3">{{trans('product.msg')}}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection @section('js') @endsection
