@extends('layouts.master') @section('title')
    {{ trans('sales.title') }}
@endsection

@section('css')
@endsection
<!-- Content Header (Page header) -->
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('sales.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('sales.main') }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')

    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between col-sm-12 col-md-4">
                    <h4 class="card-title mg-b-0">{{ trans('sales.title') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <a class="btn btn-success buttons-add btn-with-icon buttons-html5 tx-15 tx-bold" tabindex="0"
                            aria-controls="example" type="button" href="{{ route('salesinvoice_create') }}">
                            <i class="typcn typcn-document-add"></i><span>{{ trans('sales.add') }}</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive text-center ">
                    @if ($salesinv->count() > 0)
                        <table id="example2" class="table table-striped table-hover table-bordered">
                            <thead class='alert-success'>
                                <tr>

                                    <th class="wd-2" style="padding: 0;wdith:4px;">#</th>
                                    <th><span class="data">{{ trans('sales.inv_num') }}</span></th>
                                    <th><span class="data">{{ trans('sales.client') }}</span></th>
                                    <th><span class="data">{{ trans('sales.date') }}</span></th>
                                    <th><span class="data">{{ trans('sales.total') }}</span></th>
                                    <th><span class="data">{{ trans('sales.actions') }}</span></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesinv as $sales)
                                    <tr role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a
                                                href='{{ route('salesinvoice_show', ['id' => $sales->id]) }}'>{{ $sales->inv_num }}</a>
                                        </td>

                                        <td>
                                            <a
                                                href="{{ route('client_show', ['client' => $sales->client_id]) }}">{{ $sales->client->name }}</a>
                                        </td>
                                        <td>{{ $sales->inv_date }}</td>
                                        <td>{{ number_format($sales->total) . ' ' . env('MAIN_CURRENCY') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn btn-sm ripple btn-info" data-toggle="dropdown"
                                                    id="dropdownMenuButton" type="button">{{ trans('sales.actions') }}<i
                                                        class="fas fa-caret-down mx-2"></i></button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item"
                                                        data-target="#Deletesale{{ $sales->id }}" type="button"
                                                        data-toggle="modal" aria-controls="example">
                                                        <i
                                                            class="fas fa-trash fa-1x text-danger mx-2"></i>{{ trans('general.delete') }}
                                                    </button>
                                                    <a class="dropdown-item" data-target="#Editclient{{ $sales->id }}"
                                                        data-toggle="modal" aria-controls="example" type="button">
                                                        <i class="fas fa-pen fa-1x text-warning mx-2"></i>
                                                        {{ trans('general.edit') }}
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('pdf.salesinv', ['id' => $sales->id]) }}" target="_blank">
                                                        <i class="fas fa-print fa-1x text-info mx-2"></i>
                                                        {{ trans('general.print') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @include('backend.Salesinv.edit') @include('backend.Salesinv.delete')
                                @endforeach
                            </tbody>

                        </table>
                    @else
                        <div class="alert alert-solid-danger">
                            <h5 class='text-white'>{{ trans('general.msg') }}</h5>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>

    @endsection @section('js')
@endsection
