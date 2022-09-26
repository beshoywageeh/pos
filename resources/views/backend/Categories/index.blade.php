@extends('layouts.master') @section('title')
    {{trans('category.title')}}
@endsection @section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
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
                        <button data-target="#AddCategory" data-toggle="modal"
                                class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold"
                                tabindex="0" aria-controls="example" type="button">
                            <i class="typcn typcn-document-add"></i><span>{{trans('category.add')}}</span>
                        </button>
                    </div>
                </div>
                <div class="table-responsive text-center">
                    <table id="example2" class="table text-md-nowrap report-table text-center"
                           style="padding: 0; width:98%">
                        <thead class='alert-success'>
                        <tr>
                            <th class="wd-2">#</th>
                            <th>{{trans('category.name')}}</th>
                            <th>{{trans('category.note')}}</th>
                            <th>{{trans('category.actions')}}</th>
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
                                        <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">{{trans('category.actions')}} <i
                                                class="fas fa-caret-down my-1"></i></button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-target="#DeleteCategory{{$cat->id}}"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                <i class="fa fa-trash mx-2 text-danger"></i>{{trans('category.delete')}}
                                            </button>
                                            <button class="dropdown-item" data-target="#EditCategory{{$cat->id}}"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                <i class="fa fa-edit mx-2 text-warning"></i> {{trans('category.edit')}}
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('backend.Categories.edit') @include('backend.Categories.delete')
                        @empty
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

@endsection @section('js')
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

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
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

@endsection
