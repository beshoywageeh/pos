@extends('layouts.master') @section('title')
    {{ trans('category.title') }}
    @endsection @push('css')
@endpush
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
                        <li class="breadcrumb-item active">{{ trans('category.title') }}</li>
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
                        <div class="col-md-8 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12 ml-auto">
                            <a class="btn btn-primary btn-block text-white" data-target="#AddCategory" data-toggle="modal"
                                aria-controls="example" type="button">
                                <i class="fas fa-plus fa-1x mx-2"></i>{{ trans('general.add') }}
                            </a>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <table id='category_table' class="table table-sm table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('category.name') }}</th>
                                <th>{{ trans('general.notes') }}</th>
                                <th>{{ trans('general.created_at') }}</th>
                                <th>{{ trans('general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['categories'] as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('category_show', $category->id) }}">{{ $category->name }}</a>
                                    </td>
                                    <td>{{ $category->notes == true ? $category->notes : trans('general.notemsg') }}</td>
                                    <td>{{ $category->format_date() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">{{ trans('general.actions') }}<i
                                                    class="fas fa-caret-down mx-2"></i></button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item" data-target="#DeleteCategory"
                                                    data-toggle="modal" aria-controls="example" type="button"
                                                    data-pro_id="{{ $category->id }}" data-name="{{ $category->name }}">
                                                    <i
                                                        class="fas fa-trash fa-1x mx-2 text-danger"></i>{{ trans('general.delete') }}
                                                </button>
                                                <button class="dropdown-item" data-target="#EditCategory"
                                                    data-toggle="modal" aria-controls="example" type="button"
                                                    data-pro_id="{{ $category->id }}"
                                                    data-name_ar="{{ $category->getTranslation('name', 'ar') }}"
                                                    data-name_en="{{ $category->getTranslation('name', 'en') }}"
                                                    data-note="{{ $category->notes }}">
                                                    <i class="fas fa-pen mx-2 text-warning"></i>
                                                    {{ trans('general.edit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><span class="alert alert-info">{{ trans('general.msg') }}</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
                @include('backend.Categories.create')
                @include('backend.Categories.delete')
                @include('backend.Categories.edit')
            </div>
        </div>
    @endsection
    @push('js')
        <script>
            $(function() {
                $('#category_table').DataTable({
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
        <script>
            $('#EditCategory').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var Product_name_ar = button.data('name_ar');
                var Product_name_en = button.data('name_en');
                var pro_id = button.data('pro_id');
                var note = button.data('note');
                var modal = $(this);
                modal.find('.modal-body #name_ar').val(Product_name_ar);
                modal.find('.modal-body #name_en').val(Product_name_en);
                modal.find('.modal-body #note').val(note);
                modal.find('.modal-body #pro_id').val(pro_id);
            })
        </script>
        <script>
            $('#DeleteCategory').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var Product_name = button.data('name');
                var pro_id = button.data('pro_id');
                var modal = $(this);
                modal.find('.modal-body #name').val(Product_name);
                modal.find('.modal-body #pro_id').val(pro_id);
            })
        </script>
    @endpush
