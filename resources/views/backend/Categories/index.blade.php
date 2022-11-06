@extends('layouts.master') @section('title')
    {{trans('category.title')}}
@endsection @push('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
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
                </div>
                <div class="table-responsive text-center ">
                    {!! $dataTable->table([
    'class'=>'dataTable table table-striped table-hover table-bordered',
    'style'=>'width:99%',
    'id'=>'print'
],true) !!}
                    @include('backend.Categories.delete')
                </div>
            </div>
        </div>
        @include('backend.Categories.create')
    </div>

@endsection @push('js')
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush
