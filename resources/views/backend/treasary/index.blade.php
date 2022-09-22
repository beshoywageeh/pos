@extends('layouts.master') @section('title')
    {{trans('treasary.main')}}
@endsection @section('css') @endsection
<!-- Content Header (Page header) -->
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('treasary.index')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('treasary.main')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')

    @include('backend.msg')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection @section('js') @endsection
