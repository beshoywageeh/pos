@extends('layouts.master') @section('title')
    {{ trans('sidebar.setting') }}
@endsection @section('css')
@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('sidebar.setting') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('sidebar.index') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header"> <span>أملاء البيانات</span></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="form-group col">
                                        <input hidden value="1" name='id'>
                                        <label>الاسم</label>
                                        <input class="form-control" placeholder="لاسم" type="text"
                                               name="name" >
                                    </div>
                                    <div class="form-group col">
                                        <label>رقم التليفون</label>
                                        <input class="form-control" placeholder="رقم التليفون" type="text"
                                               name="phone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>العنوان</label>
                                        <input class="form-control" placeholder="العنوان" name="address"
                                               type="text">
                                    </div>
                                    <div class="form-group col">
                                        <label>الشعار</label>
                                        <input class="form-control" type="file" name="photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"> <button class="btn btn-primary-gradient pd-x-20">حفظ</button>
                </div>
            </div>
        </div>
    </form>
@endsection @section('js')
@endsection
