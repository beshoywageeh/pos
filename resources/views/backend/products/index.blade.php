@extends('layouts.master') @section('title')
    {{ trans('product.title') }}
@endsection @section('css')
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
                <h4 class="content-title mb-0 my-auto">{{ trans('product.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('product.main') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{ trans('product.title') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="{{route('product.create')}}"
                           class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold"><i
                                class="typcn typcn-document-add"></i><span>{{ trans('general.add') }}</span></a>
                    </div>
                    <div class="col-md-6">
                        <form method="POST">
                            <input id="search" placeholder='{{trans('general.codeSearch')}}' name="name"
                                   class="form-control">
                            <input id="token" hidden value="{{csrf_token()}}"/>
                            <input id="ajax_url" hidden value="{{route('product_search')}}">
                        </form>
                    </div>
                </div>
                <br>
                <hr>


                <div class="table-responsive hoverable-table my-4">

                                <table id="example-delete" class="table text-md-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-2">#</th>
                                        <th>{{ trans('product.name') }}</th>
                                        <th>{{ trans('product.category') }}</th>
                                        <th>{{ trans('product.purchase_price') }}</th>

                                        <th>{{ trans('product.sales_price') }}</th>
                                        <th>{{ trans('product.note') }}</th>
                                        <th style="width: 1rem;">{{ trans('product.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                        <tr role="row">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->purchase_price }}</td>

                                            <td>{{ $product->sales_price }}</td>
                                            <td>{{ $product->notes }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-gray-700" data-toggle="dropdown"
                                                            id="dropdownMenuButton" type="button"><i
                                                            class="fas fa-caret-down ml-1"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        <button class="dropdown-item tx-15"
                                                                data-target="#DeleteProduct{{ $product->id }}"
                                                                data-toggle="modal"
                                                                aria-controls="example" type="button">
                                                            <i class="typcn typcn-delete mr-2 text-danger"></i>{{ trans('general.delete') }}
                                                        </button>
                                                        <button class="dropdown-item tx-15"
                                                                data-target="#EditProduct{{ $product->id }}"
                                                                data-toggle="modal"
                                                                aria-controls="example" type="button">
                                                            <i class="typcn typcn-edit mr-2 text-warning"></i> {{ trans('general.edit') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('backend.Products.edit') @include('backend.Products.delete')
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="7">{{ trans('product.msg') }}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="card-footer">
                        </div>
                    </div>

                </div>
                @endsection
                @section('js')
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
                    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
                    <script src="{{URL::asset('assets/js/custom_loop_product.js')}}"></script>
@endsection
