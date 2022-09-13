@extends('layouts.master') @section('title')
    {{trans('sales.title')}}
@endsection

@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
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
                        <a class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold" tabindex="0"
                           aria-controls="example" type="button" href="{{route('sales.create')}}">
                            <i class="typcn typcn-document-add"></i><span>{{trans('sales.add')}}</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        @if($salesinv->count() > 0)
                            <table id="example" class="table text-md-nowrap report-table">
                                <thead>
                                <tr>

                                    <th class="wd-2">#</th>
                                    <th><span class="data">{{trans('sales.inv_num')}}</span></th>
                                    <th>{{trans('sales.client')}}</th>
                                    <th>{{trans('sales.date')}}</th>
                                    <th>{{trans('sales.total')}}</th>
                                    <th style="width: 1rem;">{{trans('sales.actions')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @endif
                                @forelse($salesinv as $sales)
                                    <tr role="row">
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href='{{route('saleinv',['id'=>$sales->id])}}'>{{$sales->inv_num}}</a>
                                        </td>

                                        <td>
                                            <a href="{{route('client.show',['client'=>$sales->client_id])}}">{{$sales->client->name}}</a>
                                        </td>
                                        <td>{{$sales->inv_date}}</td>
                                        <td>{{$sales->total}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn ripple btn-sm btn-gray-700" data-toggle="dropdown"
                                                        id="dropdownMenuButton" type="button"><i
                                                        class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                            href="#">
                                                        <i class="fas fa-trash fa-1x text-danger mx-2"></i>{{trans('general.delete')}}
                                                    </a>
                                                    <button class="dropdown-item"
                                                            data-target="#Editclient{{$sales->id}}" data-toggle="modal"
                                                            aria-controls="example" type="button">
                                                        <i class="fas fa-pen fa-1x text-warning mx-2"></i> {{trans('general.edit')}}
                                                    </button>
                                                    <a class="dropdown-item"
                                                            aria-controls="example" type="button" href="{{route('print',['id'=>$sales->id])}}">
                                                        <i class="fas fa-print  text-primary mx-2 fa-1x"></i> {{trans('general.print')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('backend.Salesinv.edit') @include('backend.Salesinv.delete')
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">{{trans('sales.msg')}}</td>
                                    </tr>

                                @endforelse
                                </tbody>

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>

@endsection
