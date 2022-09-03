@extends('layouts.master') 
@section('title') {{trans('client.title')}} @endsection 
@section('css')
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@livewireStyles @endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('client.title')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('client.main')}}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{trans('client.title')}}</h4>
                </div>
            </div>
        

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <button data-target="#Addclient" data-toggle="modal" class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold" tabindex="0" aria-controls="example" type="button">
                            <i class="typcn typcn-document-add"></i><span>{{trans('client.add')}}</span>
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-6">
              
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-md-nowrap text-center tx-15 tx-bold">
                        <thead>
                        <tr >
                            <th class="wd-2">كود</th>
                            <th>{{trans('client.name')}}</th>
                            <th>{{trans('client.phone')}}</th>
                            <th>{{trans('client.address')}}</th>
                            <th style="width: 1rem;">{{trans('client.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($clients as $client)
                            <tr role="row">
                                <td>{{$client->id}}</td>
                                <td><a href="{{route('client.show',['client'=>$client->id])}}">{{$client->name}}</a></td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->address}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-gray-700" data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <button class="dropdown-item bg-danger text-white tx-15" data-target="#Deleteclient{{$client->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-delete mr-2"></i>{{trans('client.delete')}}
                                            </button>
                                            <button class="dropdown-item bg-warning text-white tx-15" data-target="#Editclient{{$client->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-edit mr-2"></i> {{trans('client.edit')}}
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('backend.client.delete')
                            @include('backend.client.edit')
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">{{trans('client.msg')}}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
    
            </div>
        </div>
        @include('backend.client.create')
    </div>

@endsection @section('js')
@livewireScripts
@endsection
