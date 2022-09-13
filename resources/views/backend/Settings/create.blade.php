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
                <div class="card-header"><span>أملاء البيانات</span></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="form-group col">
                                        <input hidden value="1" name='id'>
                                        <label>الاسم</label>
                                        <input class="form-control" placeholder="لاسم" type="text"
                                               name="name" value="{{$data['name']}}">
                                    </div>
                                    <div class="form-group col">
                                        <label>رقم التليفون</label>
                                        <input class="form-control" placeholder="رقم التليفون" type="text"
                                               name="phone" value="{{$data['phone']}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>العنوان</label>
                                        <input class="form-control" placeholder="العنوان" name="address"
                                               type="text" value="{{$data['address']}}">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>اختصار</label>
                                            <input class="form-control" placeholder="العنوان" name="slogan"
                                                   type="text" value="{{$data['slogan']}}">
                                        </div>
                                    <div class="form-group col">
                                        <label>الشعار</label>
                                        <input class="form-control" accept="image/*" type="file" name="photo" id="logo"
                                               onchange="showPreview(event)">
                                        <img src="{{URL::asset('assets/img/') .'/'. $data['photo']}}"
                                             class="img img-responsive img-thumbnail w-50" id="preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary-gradient pd-x-20">حفظ</button>
                </div>
            </div>
        </div>
    </form>
@endsection @section('js')
    <script src="{{URL::asset('assets/js/custom_loop.js')}}"></script>
@endsection
