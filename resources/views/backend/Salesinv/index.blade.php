@extends('layouts.master') @section('title') {{trans('sales.title')}} @endsection @section('css') @endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('sales.title')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('sales.main')}}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{trans('sales.title')}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <a class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold" tabindex="0" aria-controls="example" type="button" href="{{route('sales.create')}}">
                            <i class="typcn typcn-document-add"></i><span>{{trans('sales.add')}}</span>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="example_filter" class="dataTables_filter">
                            <label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="example" /></label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-md-nowrap text-center tx-15 tx-bold">
                        <thead>
                        <tr >
                            <th class="wd-2">#</th>
                            <th>{{trans('sales.inv_num')}}</th>
                            <th>{{trans('sales.client')}}</th>
                            <th>{{trans('sales.date')}}</th>
                            <th>{{trans('sales.total')}}</th>
                            <th style="width: 1rem;">{{trans('sales.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($salesinv as $sales)
                            <tr role="row">
                                <td>{{$loop->iteration}}</td>
                                <td><a href='{{route('saleinv',['id'=>$sales->id])}}'>{{$sales->inv_num}}</a></td>

                                <td><a href="{{route('client.show',['client'=>$sales->client_id])}}">{{$sales->client->name}}</a></td>
                                <td>{{$sales->inv_date}}</td>
                                <td>{{$sales->total}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-gray-700" data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <button class="dropdown-item bg-danger text-white tx-15" data-target="#Deletesales{{$sales->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-delete mr-2"></i>{{trans('sales.delete')}}
                                            </button>
                                            <button class="dropdown-item bg-warning text-white tx-15" data-target="#Editsales{{$sales->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-edit mr-2"></i> {{trans('sales.Edit')}}
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('backend.Salesinv.edit') @include('backend.Salesinv.delete') @empty
                            <tr>
                                <td class="text-center" colspan="4">{{trans('sales.msg')}}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js') @endsection
