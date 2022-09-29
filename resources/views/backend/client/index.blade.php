@extends('layouts.master')
@section('title')
    {{trans('client.title')}}
@endsection
@section('css')
    <style type="text/css">
        .select2 {
            width: 100% !important;
        }
        }
    </style>
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
                        <button data-target="#Addclient" data-toggle="modal"
                                class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold"
                                tabindex="0" aria-controls="example" type="button">
                            <i class="typcn typcn-document-add"></i><span>{{trans('client.add')}}</span>
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-6">

                    </div>
                </div>
                <div class="table-responsive">
                    <table id="clients" class="table text-md-nowrap report-table text-center"
                           style="padding: 0; width:98%">
                        <thead class='alert-success'>
                        <tr>
                            <th class="wd-2" style="padding: 0;wdith:4px;">{{trans('client.code')}}</th>

                            <th>{{trans('client.name')}}</th>
                            <th>{{trans('client.phone')}}</th>
                            <th>{{trans('client.address')}}</th>
                            <th>{{trans('client.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($clients as $client)
                            <tr role="row">
                                <td>{{$client->id}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->address}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                                class="btn btn-sm ripple btn-info" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">{{trans('client.actions')}}<i
                                                class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-target="#Deleteclient{{$client->id}}"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                <i class="fas fa-trash text-danger mx-2"></i>{{trans('client.delete')}}
                                            </button>
                                            <button class="dropdown-item" data-target="#Editclient{{$client->id}}"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                <i class="fas fa-pen mx-2 text-warning"></i> {{trans('client.edit')}}
                                            </button>
                                            <a class="dropdown-item"
                                               href="{{route('client.show',['client'=>$client->id])}}">
                                                <i class="fas fa-info  text-info mx-2 fa-1x"></i> {{trans('client.details')}}
                                            </a>
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
        </div>
        @include('backend.client.create')
    </div>

@endsection @section('js')
    @livewireScripts
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
    <script>
        $(document).ready(function () {
            $('#clients').DataTable(
                {
                    lengthChange: true,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    dom: 'Bfrtip',
                    responsive: true,
                    buttons: [
                        {
                            'extend': 'print',
                            'customize': function (win) {
                                $(win.document.body)
                                    .css('direction', 'rtl').css('text-align', 'center');
                                $(win.document.body).find('table .hidden_print').css('display', 'none')
                            },
                            'className': 'btn btn-primary',
                            'text': `<i class="fas fa-print mx-2"></i> {{trans('general.print')}}`,
                        },
                        {
                            'extend': 'excel',
                            'className': 'btn btn-primary',
                            'text': `<i class="fas fa-download mx-2"></i> {{trans('general.exportexcel')}}`
                        },
                    ],
                    language: {
                        searchPlaceholder: '{{trans('general.search')}}',
                        sSearch: '{{trans('general.search')}}',
                        sZeroRecords: '{{trans('general.szero')}}',
                        sInfo: '{{trans('general.sinfo')}}',
                        sInfoEmpty: '{{trans('general.sinfoempty')}}',
                        sInfoThousands: '{{trans('general.sinfothous')}}',
                        sInfoPostFix: '{{trans('general.sinfopostfix')}}',
                        sInfoFiltered: '{{trans('general.sinfopostfix')}}',
                        oPaginate: {
                            sFirst: '{{trans('general.sfirst')}}',
                            sLast: '{{trans('general.sLast')}}',
                            sNext: '{{trans('general.snext')}}',
                            sPrevious: '{{trans('general.sprev')}}',
                        },

                    },

                });

        });


    </script>
@endsection
