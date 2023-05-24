@extends('layouts.master') @section('title')
    {{ trans('category.title') }}
    @endsection @push('css')
@endpush
<!-- Content Header (Page header) -->
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('category.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ trans('category.main') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('category.title') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    
    @include('backend.msg')
<div class="container-fluid">
    
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex">
            
                <h3 class="card-title p-1">
                    {{ trans('category.title') }}</h3>
            </div>
            <div class="card-body">
                    {!! $dataTable->table(
                        [
                            'class' => 'table table-sm',
                            'style' => 'text-align:center',
                            'data-page-length' => '50',
                        ],
                        true,
                    ) !!}
        </div>
        @include('backend.Categories.create')
        @include('backend.Categories.delete')
        @include('backend.Categories.edit')
    </div>
</div>
@endsection
@push('js')
    <script src="{{ URL::asset('') }}vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush
