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

                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-12">
                                    <div class="d-flex justify-content-center align-items-center my-2">
                                        <label class="mx-2" style="width: 16%">الشعار</label>
                                        <input class="form-control" accept="image/*" type="file" name="photo"
                                               id="logo"
                                               onchange="showPreview(event)">

                                    </div>
                                    <div class="d-flex align-items-center justify-content-center my-2">
                                        <img src="{{URL::asset('assets/img/') .'/'. $data['photo']}}"
                                             class="img img-responsive img-thumbnail w-75" id="preview">
                                    </div>

                                </div>
                                <div class="form-group col-lg-8 col-sm-12">
                                    <input hidden value="1" name='id'>
                                    <div class="row">
                                        <div class="d-flex align-items-center justify-content-center my-2">
                                            <label class="mx-2" style="width: 16%">الاسم</label>
                                            <input class="form-control" placeholder="لاسم" type="text"
                                                   name="name" value="{{$data['name']}}">
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center my-2">
                                            <label class="mx-2" style="width: 16%">رقم التليفون</label>
                                            <input class="form-control" placeholder="رقم التليفون" type="text"
                                                   name="phone" value="{{$data['phone']}}">
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center my-2">
                                            <label class="mx-2" style="width: 16%">العنوان</label>
                                            <input class="form-control" placeholder="العنوان" name="address"
                                                   type="text" value="{{$data['address']}}">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center my-2">
                                            <label class="mx-2" style="width: 16%">اختصار</label>
                                            <input class="form-control" placeholder="العنوان" name="slogan"
                                                   type="text" value="{{$data['slogan']}}">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" d-flex justify-content-end">
                <button class="btn btn-primary"><i class="fas fa-plus mx-2"></i>حفظ</button>
            </div>
        </div>
    </form>
@endsection @section('js')
    <script src="{{URL::asset('assets/js/custom_loop.js')}}"></script>
@endsection
