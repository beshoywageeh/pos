@extends('layouts.master') @section('title')
    {{ trans('invoice.newinv') }}
@endsection
@section('css')
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoice.newinv') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('sales.main') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12 text-center justify-center align-middle">

        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="card-title mg-b-0">{{ trans('invoice.newinv') }}</h3>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
            <hr>
                <form action="{{ route('salesinvoice_create') }}" method="post" autocomplete="off">
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
                                <input value="" id="time" class="form-control" />
                            </div>
                        </div>
                    </div>
                        <div class="row my-4">
                            <div class="col-lg-12" id='inv_data'>
                                <div class="input-group">
                                    <label for="inv_num" class="input-group-text">{{ trans('sales.inv_num') }}</label>
                                    <input type="text" id="inv_num" class="form-control" value="{{$data['ex'][0]}}-{{$data['ex'][1]+1}}" name='inv_num' readonly>
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
    <script src="{{ URL::asset('assets/js/custom_loop.js') }}"></script>
    <script>
        let
            balance = document.querySelector('#client_balance');
        $(document).on('change', '#client', function(e) {
            let client = $(this).val();
            $.ajax({
                method: "GET",
                url: "{{ route('client_balance_invoice') }}/" + client,
                cache: false,
                datatype: 'json',
                success: function(data) {
                    balance.value = data;

                },
            });
        });
    </script>
@endpush
