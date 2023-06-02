@extends('layouts.master') @section('title')
    {{ trans('invoice.newinv') }}
@endsection
@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('sales.title') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('salesinvoice_index') }}">{{ trans('general.main') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('sales.newinv') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    @include('backend.msg')
    <div class="container-fluid">

        <div class="col-xl-12 text-center justify-center align-middle">

            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3 class="card-title mg-b-0">{{ trans('invoice.newinv') }}</h3>
                        </div>

                    </div>
                </div>
                <form action="{{ route('salesinvoice_create') }}" method="POST" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="input-group">
                                    <label for="date" class='input-group-text'>{{ trans('invoice.date') }}</label>
                                    <input type="date" class="form-control" name='date' value="{{ date('Y-m-d') }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-group">
                                    <label for="time" class="input-group-text">{{ trans('invoice.time') }}</label>
                                    <input value="" id="time" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-6" id='inv_data'>
                                <div class="input-group">
                                    <label for="inv_num" class="input-group-text">{{ trans('sales.inv_num') }}</label>
                                    <input type="text" id="inv_num" class="form-control"
                                           value="{{$data['ex'][0]}}-{{$data['ex'][1]+1}}" name='inv_num' readonly>
                                </div>
                            </div>
                            <div class="col-lg-6" id='inv_data'>
                                <div class="input-group">
                                    <label for="inv_num" class="input-group-text">{{ trans('sales.inv_man') }}</label>
                                    <input type="text" id="inv_man" class="form-control"
                                           value="" name='inv_man'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class='input-group-text'>{{ trans('client.chooseclient') }}</span>
                                    <select class="select2 form-control" id="client" name="client">
                                        <option selected disabled>{{ trans('client.chooseclient') }}</option>
                                        @foreach ($data['clients'] as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->id }} - {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <span class='input-group-text'>{{ trans('invoice.client_balance') }} : </span>
                                    <input type="text" id='client_balance' class="form-control" value="" readonly>
                                    <span class='input-group-text'>{{ env('Main_currency') }}</span>
                                    @error('client')
                                    <div class="alert alert-solid-danger mg-b-0 my-2" role="alert">
                                        <span class="text-white"><strong>{{ $message }}</strong></span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-success btn-block'>{{ trans('general.save') }}</button>
                    </div>
                </form>

            </div>

            </form>

        </div>
    </div>

@endsection
@push('js')
    <script>
        let
            balance = document.querySelector('#client_balance');
        $(document).on('change', '#client', function (e) {
            let client = $(this).val();
            $.ajax({
                method: "GET",
                url: "{{ route('client_balance_invoice') }}/" + client,
                cache: false,
                datatype: 'json',
                success: function (data) {
                    balance.value = data;

                },
            });
        });
    </script>
    <script>
        $('.select2').select2();
    </script>
@endpush
