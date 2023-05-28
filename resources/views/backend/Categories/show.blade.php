@extends('layouts.master') @section('title') {{trans('product.title')}} @endsection



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
                    <li class="breadcrumb-item"><a href="{{route('category_index')}}">{{ trans('category.main') }}</a></li>
                    <li class="breadcrumb-item active">{{$category->name}}</li>
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
                <h3 >{{trans('product.title')}}</h3>
            </div>

            <div class="col-sm-12 col-md-6 text-center">
                <h3 class='alert alert-info'>{{$category->name}}</h3>
            </div>
         </div>
            </div>
            <div class="card-body"><table id='category_data' class="table table-bordered table-striped text-center">
                        <thead>
                        <tr >
                            <th class="wd-2">#</th>
                            <th>{{trans('product.name')}}</th>
                            <th>{{trans('product.note')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr role="row">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->notes == true ? $product->notes : trans('general.notemsg')}}</td>
                                                           </tr>
                             @empty
                            <tr>
                                <td class="text-center" colspan="3">{{trans('product.msg')}}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


    </div>
   </div>

@endsection @push('js')
<script>
    $(function() {
        $('#category_data').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            'language': {
                url: '//cdn.datatables.net/plug-ins/1.10.12/i18n/Arabic.json'
            },


        });
    });
</script>
@endpush
