@extends('layouts.master') @section('title') {{trans('sidebar.setting')}} @endsection @section('css') @endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('sidebar.setting')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('sidebar.index')}}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{trans('sidebar.setting')}}</h4>
                    <a class="btn btn-primary-gradient mg-b-0 align-right" href="{{route('create')}}"><i class="fa fa-plus"></i> &nbsp;&nbsp; تعديل</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <div class="pl-0">
                            <div class="main-profile-overview">
                                <div class="main-img-user profile-user">


                                    <img alt="" src="{{($data->photo=='') ? URL::asset('assets/img/brand/favicon.png') : URL::asset('assets/img/'),$data->photo}}">
                                </div>
                                <div class="d-flex justify-content-between mg-b-20">
                                    <div>
                                        <h5 class="main-profile-name">{{($data->name == '') ? 'LoopLabs' : $data->name}}</h5>
                                    </div>
                                </div>
                                <hr class="mg-y-30">
                                <label class="main-content-label tx-13 mg-b-20">Contact</label>
                                <div class="main-profile-social-list">
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>Phone</span> <span>{{($data->phone == '') ? '01201026745' : $data->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>Address</span> <span>{{$data->address}}</span>
                                        </div>
                                    </div>
                                    <select class="form-control @error('country_id') is-invalid @enderror" name="category_id">
                                        <option value="" disabled selected>{{trans('product.chcat')}}</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->governorate_id}} - {{$country->city_name_ar}}</option>
                                        @endforeach
                                    </select>
                            </div><!-- main-profile-overview -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js') @endsection
