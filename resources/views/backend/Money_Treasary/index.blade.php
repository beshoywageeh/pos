@extends('layouts.master')
@section('title')
    {{ trans('money_treasary.money_transaction') }}
@endsection
@push('css')

@endpush
<!-- Content Header (Page header) -->
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('money_treasary.money_transaction') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('money_treasary.main') }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('backend.msg')
    <div class='col-xl-12'>
        <div class="card mg-b-20">
            <div class="card-header d-flex">
                <div class="col-sm-12 col-md-10 left-content">
                    <h4 class="card-title mg-b-0">
                        تسجيل جديد

                    </h4>
                </div>
            </div>
            <div class="card-body py-4">
                <form action="{{ route('money_treasary_store') }}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <label class="mg-b-10">{{ trans('general.date') }}</label>
                            <input class="form-control" type="date" name="date" id=""
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <label class="mg-b-10">{{ trans('client.chooseclient') }}</label>
                            <select class="form-control select2" name="client">
                                <option selected disabled>{{ trans('client.chooseclient') }}</option>

                                @foreach ($data['Client'] as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client')
                                <div class="alert alert-solid-danger mg-b-0 my-2" role="alert">
                                    <span class="text-white"><strong>{{ $message }}</strong></span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <label class="mg-b-10">{{ trans('money_treasary.type') }}</label>
                            <select class="form-control select2" name="type">
                                <option value="1" selected>
                                    {{ trans('money_treasary.in') }}
                                </option>
                                <option value="2">
                                    {{ trans('money_treasary.out') }}
                                </option>
                                <option value="3">
                                    {{ trans('money_treasary.balance') }}
                                </option>
                            </select>
                            @error('client')
                                <div class="alert alert-solid-danger mg-b-0 my-2" role="alert">
                                    <span class="text-white"><strong>{{ $message }}</strong></span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <label class="mg-b-10">{{ trans('money_treasary.amount') }}</label>
                            <input type="text" name="amount" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <label class="mg-b-10">{{ trans('general.notes') }}</label>

                            <textarea name="note" class='form-control' id="" cols="2" rows="1"></textarea>
                        </div>
                        <div class="col-lg-4">
                            <span id='balance'></span>
                            <button class="btn btn-success"><i
                                    class="fa fa-plus mx-2"></i><span>{{ trans('general.add') }}</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header d-flex">
                <div class="col-sm-12 col-md-10 left-content">
                    <h4 class="card-title mg-b-0">{{ trans('money_treasary.money_transaction') }}</h4>
                </div>

            </div>
            <div class="card-body py-0">


                <div class="table-responsive text-center ">
                    <table id="example2" class="table table-striped table-hover table-bordered"
                        style="padding: 0; width:98%">
                        <thead class="alert-success text-black">
                            <tr>
                                <th class="wd-2" style="padding: 0;wdith:4px;">#</th>
                                <th>{{ trans('money_treasary.code') }}</th>
                                <th>{{ trans('money_treasary.name') }}</th>
                                <th>{{ trans('money_treasary.created_by') }}</th>
                                <th>{{ trans('money_treasary.created_at') }}</th>
                                <th>{{ trans('money_treasary.debit') }}</th>
                                <th>{{ trans('money_treasary.credit') }}</th>
                                <th style="width: 1rem;">{{ trans('general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['Money_Treasary'] as $transaction)
                                <tr role="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->num }}</td>
                                    <td>{{ $transaction->client->name }}</td>
                                    <td>{{ $transaction->user->first_name }}</td>
                                    <td>{{ $transaction->payed_at }}</td>
                                    <td>{{ $transaction->debit }}</td>
                                    <td>{{ $transaction->credit }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">{{ trans('product.actions') }}<i
                                                    class="fas fa-caret-down mx-2"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item delete"
                                                    data-target="#DeleteProduct{{ $transaction->id }}" data-toggle="modal"
                                                    aria-controls="example" type="button">
                                                    <i
                                                        class="fas fa-trash fa-1x mx-2 text-danger"></i>{{ trans('general.delete') }}
                                                </a>
                                                <button class="dropdown-item"
                                                    data-target="#EditProduct{{ $transaction->id }}" data-toggle="modal"
                                                    aria-controls="example" type="button">
                                                    <i class="fas fa-pen mx-2 text-warning"></i>
                                                    {{ trans('general.edit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">{{ trans('transaction.msg') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
@endsection
@push('js')

    <script src="{{ URL::asset('assets/js/custom_loop_product.js') }}"></script>
@endpush
