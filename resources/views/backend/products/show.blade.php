@extends('layouts.master') @section('title')
    {{ trans('product.title') }}
@endsection



<!-- Content Header (Page header) -->
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('product.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product_index') }}">{{ trans('general.main') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $data['product']->name }}</li>
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
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-12 col-md-6 text-center">
                            <h3>{{ trans('product.title') }}</h3>
                        </div>

                        <div class="col-sm-12 col-md-6 text-center">
                            <h3 class='alert alert-info'>{{ $data['product']->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-info table-bordered text-center mb-2">
                        <tr rowspan="2">
                            <td colspan="2"><img
                                    src="data:image/png;base64,{{ DNS1D::getBarcodePNG($data['product']->barcode, 'C39+', 3, 35, [1, 1, 1], true) }}"
                                    alt="barcode" /></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>{{ trans('product.purchase_price') }} :
                                    {{ $data['product']->format_price($data['product']->purchase_price) }}</h4>
                            </td>
                            <td>
                                <h4>{{ trans('product.sales_price') }} :
                                    {{ $data['product']->format_price($data['product']->sales_price) }}</h4>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h4>{{ trans('product.purchase_unit') }} : {{ $data['product']->purchase_unit }}</h4>
                            </td>
                            <td>
                                <h4>{{ trans('product.sales_unit') }} : {{ $data['product']->sales_unit }}</h4>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h4>{{ trans('general.note') }} : {{ $data['product']->note }}</h4>
                            </td>
                            <td>
                                <h4>{{ trans('general.name') }} : {{ $data['product']->category->name }}</h4>
                            </td>

                        </tr>
                    </table>
                    <table id='category_data' class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th>{{ trans('sales.inv_num') }}</th>
                                <th>{{ trans('sales.date') }}</th>
                                <th>{{ trans('sales.inv_quantity') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>============></td>
                                <td>{{ $data['product']->opening_balance }}</td>
                            </tr>
                            @forelse ($data['product']->salesinvs as $sales_invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sales_invoice->salesinv->inv_num }}</td>
                                    <td>{{ $sales_invoice->salesinv->inv_date }}</td>
                                    <td>{{ $sales_invoice->quantity }}</td>

                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    @endsection @push('js')
    @if (App::getlocale() == 'ar')
        <script>
            let table = new DataTable('#category_data', {
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json'
                }
            });
        </script>
    @else
        <script>
            let table = new DataTable('#category_data', {
                responsive: true,
            });
        </script>
    @endif
@endpush
