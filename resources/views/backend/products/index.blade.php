@extends('layouts.master')
@section('title')
    {{ trans('product.title') }}
@endsection
@push('css')

@endpush

@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('product.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product_index') }}">{{ trans('product.title') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('general.main') }}</li>
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
                    <div class=" col-sm-12 col-md-6">
                        <a href="{{ route('product_create') }}" class="btn btn-success btn-block"><i
                                class="fa fa-plus"></i><span>{{ trans('general.add') }}</span></a>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                        <table id="products" class="table table-striped table-sm table-bordered text-center"
                            >
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('product.barcode') }}</th>
                                    <th>{{ trans('general.name') }}</th>
                                    <th>{{ trans('product.category') }}</th>
                                    <th>{{ trans('product.purchase_price') }}</th>
                                    <th>{{ trans('product.sales_price') }}</th>
                                    <th>{{ trans('general.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($product->barcode, 'C39+',1,30,array(1,1,1), true)}}" alt="barcode"   />
                                        <span class="hidden">{{$product->barcode}}</span>
                                        </td>
                                        <td><a href="{{route('product_show',$product->id)}}">{{ $product->name }}</a></td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->format_price($product->purchase_price) }}</td>
                                        <td>{{ $product->format_price($product->sales_price) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn btn-info btn-sm" data-toggle="dropdown"
                                                    id="dropdownMenuButton" type="button">{{ trans('general.actions') }}<i
                                                        class="fas fa-caret-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item delete"
                                                        data-target="#DeleteProduct{{ $product->id }}" data-toggle="modal"
                                                        aria-controls="example" type="button">
                                                        <i
                                                            class="fas fa-trash fa-1x mx-2 text-danger"></i>{{ trans('general.delete') }}
                                                    </a>
                                                    <a class="dropdown-item"  href='{{route('product_edit',$product->id)}}'>
                                                        <i class="fas fa-pen mx-2 text-warning"></i>
                                                        {{ trans('general.edit') }}
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <i class="fas fa-info mx-2 text-info"></i> {{ trans('product.info') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('backend.Products.delete')
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">{{ trans('product.msg') }}</td>
                                    </tr>
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
@if (App::getlocale()=='ar')
<script>

    let table = new DataTable('#products', {
    responsive: true,
    language: {
        url:'//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json'
    }
});
</script>


@else
<script>

    let table = new DataTable('#products', {
    responsive: true,
});
</script>

@endif
@endpush
