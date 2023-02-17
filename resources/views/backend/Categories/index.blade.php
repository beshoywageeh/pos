@extends('layouts.master') @section('title')
    {{ trans('category.title') }}
    @endsection @push('css')
@endpush
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('category.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('category.main') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{ trans('category.title') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                </div>
                <div class="table-responsive text-center ">
                    {!! $dataTable->table(
                        [
                            'class' => 'dataTable table table-striped table-bordered',
                            'style' => 'width:99%',
                            'id' => 'print',
                        ],
                        true,
                    ) !!}
                </div>

            </div>
        </div>
        @include('backend.Categories.create')
        @include('backend.Categories.delete')
        @include('backend.Categories.edit')
    </div>
@endsection
@push('js')
    {!! $dataTable->scripts() !!}
    <script src="{{ URL::asset('') }}vendor/datatables/buttons.server-side.js"></script>
@endpush
