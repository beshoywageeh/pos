@extends('layouts.master') @section('title')
    {{ trans('product.title') }}
@endsection



<!-- Content Header (Page header) -->
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('category.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('category_index') }}">{{ trans('category.main') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $data['category']->name }}</li>
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
                            <h3 class='alert alert-info'>{{ $data['category']->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id='category_data' class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th>{{ trans('product.barcode') }}</th>
                                <th>{{ trans('product.name') }}</th>
                                <th>{{ trans('product.note') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['category']->products as $product)
                                <tr role="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($product->barcode, 'C39+', 1, 30, [1, 1, 1], true) }}"
                                            alt="barcode" />
                                        <span class="hidden">{{ $product->barcode }}</span>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->notes == true ? $product->notes : trans('general.notemsg') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">{{ trans('product.msg') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    @endsection @push('js')
@if (App::getlocale()=='ar')
<script>

    let table = new DataTable('#category_data', {
    responsive: true,
    language: {
        url:'//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json'
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
