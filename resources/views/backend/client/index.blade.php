@extends('layouts.master')
@section('title')
    {{ trans('client.title') }}
@endsection
@push('css')
    <style type="text/css">
        .select2 {
            width: 100% !important;
        }
    </style>
@endpush
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('client.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('client_index') }}">{{ trans('general.main') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('client.title') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
<!-- Content Header (Page header) -->
@section('content')
    @include('backend.msg')
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12 ml-auto">
                            <button data-target="#Addclient" data-toggle="modal" class="btn btn-success btn-block"
                                tabindex="0" aria-controls="example" type="button">
                                <i class="fa fa-plus fa-1x mx-2"></i><span>{{ trans('general.add') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="clients_data" class="table table-sm table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('client.code') }}</th>
                                <th>{{ trans('client.name') }}</th>
                                <th>{{ trans('client.phone') }}</th>
                                <th>{{ trans('client.address') }}</th>
                                <th>{{ trans('client.balance') }}</th>
                                <th>{{ trans('client.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                                <tr role="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $client->code }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->totalBalance() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn btn-sm ripple btn-info" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">
                                                {{ trans('client.actions') }}
                                                <i class="fas fa-caret-down ml-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item"
                                                    data-name_ar="{{ $client->getTranslation('name', 'ar') }}"
                                                    data-name_en="{{ $client->getTranslation('name', 'en') }}"
                                                    data-code='{{ $client->code }}' data-id="{{ $client->id }}"
                                                    data-phone="{{ $client->phone }}"
                                                    data-country="{{ $client->country }}"
                                                    data-address="{{ $client->address }}" data-balance="{{ $client->balance }}" data-target="#Editclient"
                                                    data-toggle="modal" aria-controls="example" type="button">
                                                    <i class="fas fa-pen mx-2 text-warning"></i>
                                                    {{ trans('client.edit') }}
                                                </button>
                                                <button class="dropdown-item"
                                                    data-target="#Deleteclient" data-id="{{ $client->id }}" data-name="{{ $client->name }}" data-toggle="modal"
                                                    aria-controls="example" type="button">
                                                    <i
                                                        class="fas fa-trash text-danger mx-2"></i>{{ trans('client.delete') }}
                                                </button>

                                                <a class="dropdown-item"
                                                    href="{{ route('client_show', ['client' => $client->id]) }}">
                                                    <i class="fas fa-info  text-info mx-2 fa-1x"></i>
                                                    {{ trans('client.details') }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">{{ trans('client.msg') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('backend.client.delete')
            @include('backend.client.edit')
            @include('backend.client.create')
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.select2').select2();
    </script>
    @if (App::getlocale() == 'ar')
        <script>
            let table = new DataTable('#clients_data', {
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json'
                }
            });
        </script>
    @else
        <script>
            let table = new DataTable('#category_table', {
                responsive: true,
            });
        </script>
    @endif

    <script>
        $('#Editclient').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var name_ar = button.data('name_ar');
            var name_en = button.data('name_en');
            var id = button.data('id');
            var code = button.data('code');
            var phone = button.data('phone');
            var country = button.data('country');
            var address = button.data('address');
            var balance = button.data('balance');
            var modal = $(this);
            modal.find('.modal-body #arabic').val(name_ar);
            modal.find('.modal-body #english').val(name_en);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #code').val(code);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #address').val(address);
           // modal.find('.modal-body #country_id').val(country);
            modal.find('.modal-body #balance').val(balance);

        })
    </script>
    <script>
        $('#Deleteclient').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var name = button.data('name');
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endpush
