<div class="modal" id="Editclient">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{ trans('client.edit') }}</h3>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('client_update', 'test') }}" method="POST" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="id" value="" id='id' />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="arabic">{{ trans('client.arabicname') }}</label>
                            <input type="text" name="name" id="arabic" value=""
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ trans('client.arabicname') }}" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="english">{{ trans('client.englishname') }}</label>
                            <input type="text" name="name_en" value="" id="english"
                                class="form-control @error('name_en') is-invalid @enderror"
                                placeholder="{{ trans('client.englishname') }}" />
                            @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="phnoe">{{ trans('client.phone') }}</label>
                            <input type="text" name="phone" id="phone" value=""
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ trans('client.arabicname') }}" />
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="country">{{ trans('client.country') }}</label>

                            <select class="form-control @error('country_id') is-invalid @enderror" name="country_id"
                                id="country_id">
                                <option value="" disabled selected>{{ trans('client.country') }}</option>

                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $loop->iteration }} -
                                        {{ $country->city_name_ar }}</option>
                                @endforeach
                            </select>
                            @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="code">{{ trans('client.code') }}</label>
                            <input readonly value="{{ old('code') }}" type="number" name="code" id="code"
                                class="form-control @error('code') is-invalid @enderror"
                                placeholder="{{ trans('client.code') }}">
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="balance">{{ trans('client.balance') }}</label>
                            <input readonly value="" type="number" name="balance" id="balance"
                                class="form-control @error('balance') is-invalid @enderror"
                                placeholder="{{ trans('client.balance') }}">
                            @error('balance')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ trans('client.address') }}</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="5"
                            placeholder="{{ trans('client.address') }}"></textarea>
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">{{ trans('client.edit') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
