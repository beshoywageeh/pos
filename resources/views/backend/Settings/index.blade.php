@extends('layouts.master') @section('title')
    {{trans('sidebar.setting')}}
@endsection @section('css') @endsection
<!-- Content Header (Page header) -->
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('sidebar.setting')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('sidebar.index')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')

    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between col-sm-12 col-md-12">
                    <h4 class="card-title">{{trans('sidebar.setting')}}</h4>
                    <a class="btn btn-primary" href="{{route('edit',['id'=>1])}}"><i
                            class="fa fa-plus"></i> &nbsp;&nbsp; {{trans('general.edit')}}</a>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="col-sm-12 col-md-12">
                    <div class="pl-0">
                        <div class="row my-4">
                            <div class="d-flex col-lg-4 justify-content-around align-items-center ">
                                <img class="img img-responsive img-thumbnail w-75" alt=""
                                     src="{{URL::asset('assets/img/')}}/{{$data['photo']}}">
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="main-profile-name">{{$data['name']}}</h5>
                                    </div>
                                </div>
                                <hr class="mg-y-10">
                                <h4 class="main-content-label tx-13 mg-b-20 display-4">{{trans('settings.contact')}}</h4>
                                <div class="main-profile-social-list">
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6>{{trans('settings.phone')}}</h6> <h5>{{$data['phone']}}</h5>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6>{{trans('settings.adress')}}</h6> <h5>{{$data['address']}}</h5>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- main-profile-overview -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js') @endsection
