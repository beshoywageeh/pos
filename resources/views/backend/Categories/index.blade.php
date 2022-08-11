@extends('layouts.master') @section('title') {{trans('category.title')}} @endsection @section('css') @endsection
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
                    <div class="col-sm-12 col-md-6">
                        <button data-target="#AddCategory" data-toggle="modal" class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold" tabindex="0" aria-controls="example" type="button">
                            <i class="typcn typcn-document-add"></i><span>{{trans('category.add')}}</span>
                        </button>
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
                            <th>{{trans('category.name')}}</th>
                            <th>{{trans('category.note')}}</th>
                            <th style="width: 1rem;">{{trans('category.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $cat)
                            <tr role="row">
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('category.show',['category'=>$cat->id])}}">{{$cat->name}}</a></td>
                                <td>{{$cat->notes == true ? $cat->notes : trans('category.notemsg')}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-gray-700" data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <button class="dropdown-item bg-danger text-white tx-15" data-target="#DeleteCategory{{$cat->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-delete mr-2"></i>{{trans('category.delete')}}
                                            </button>
                                            <button class="dropdown-item bg-warning text-white tx-15" data-target="#EditCategory{{$cat->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-edit mr-2"></i> {{trans('category.edit')}}
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('backend.Categories.edit') @include('backend.Categories.delete') @empty
                            <tr>
                                <td class="text-center" colspan="4">{{trans('category.msg')}}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('backend.Categories.create')
    </div>

@endsection @section('js') @endsection
