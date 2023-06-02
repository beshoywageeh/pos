@extends('layouts.master') @section('title')
    {{ trans('sales.title') }}
@endsection

@push('css')
@endpush
<!-- Content Header (Page header) -->

@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('sales.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('salesinvoice_index') }}">{{ trans('general.main') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('sales.title') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    @include('backend.msg')


<div class="container-fluid">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('intial_sales') }}" class="btn btn-success btn-block">
                            <i class="fa fa-plus"></i><span>{{ trans('sales.add') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <table id="invoice_data" class="table table-hover table-bordered table-sm text-center">
                        <thead >
                        <tr>
                            <th >#</th>
                            <th><span class="data">{{ trans('sales.inv_num') }}</span></th>
                            <th><span class="data">{{ trans('sales.client') }}</span></th>
                            <th><span class="data">{{ trans('sales.date') }}</span></th>
                            <th><span class="data">{{ trans('sales.total') }}</span></th>
                            <th><span class="data">{{ trans('sales.actions') }}</span></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($salesinv as $sales)
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
                                            <button class="dropdown-item" data-target="#Deletesale{{ $sales->id }}"
                                                    type="button" data-toggle="modal" aria-controls="example">
                                                <i
                                                    class="fas fa-trash fa-1x text-danger mx-2"></i>{{ trans('general.delete') }}
                                            </button>
                                            <a class="dropdown-item" data-target="#Editclient{{ $sales->id }}"
                                               data-toggle="modal" aria-controls="example" type="button">
                                                <i class="fas fa-pen fa-1x text-warning mx-2"></i>
                                                {{ trans('general.edit') }}
                                            </a>
                                            <a class="dropdown-item"
                                               href="{{ route('pdf.salesinv', ['id' => $sales->id]) }}"
                                               target="_blank">
                                                <i class="fas fa-print fa-1x text-info mx-2"></i>
                                                {{ trans('general.print') }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <div class="alert alert-danger">
                                <h5 class='text-white'>{{ trans('general.msg') }}</h5>
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@push('js')

    @if (App::getlocale() == 'ar')
        <script>
            let table = new DataTable('#invoice_data', {
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json'
                }
            });
        </script>
    @else
        <script>
            let table = new DataTable('#invoice_data', {
                responsive: true,
            });
        </script>
    @endif
@endpush
