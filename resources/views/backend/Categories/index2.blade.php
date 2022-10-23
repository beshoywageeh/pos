@extends('layouts.master') @section('title')
    {{trans('category.title')}}
@endsection @section('css')
@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('category.title')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('category.main')}}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{trans('category.title')}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <button data-target="#AddCategory" data-toggle="modal"
                                class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold"
                                tabindex="0" aria-controls="example" type="button">
                            <i class="typcn typcn-document-add"></i><span>{{trans('category.add')}}</span>
                        </button>
                    </div>
                </div>
                <div class="table-responsive text-center">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        @include('backend.Categories.create')
    </div>

@endsection @section('js')
    {{ $dataTable->scripts() }}

@endsection
