
<div class="modal" id="Addclient">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{trans('client.add')}}</h3><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
                <form action="{{route('client_create')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="arabic">{{trans('client.arabicname')}}</label>
                                <input required  type="text" name="name" id="arabic" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="{{trans('client.arabicname')}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="english">{{trans('client.englishname')}}</label>
                                <input required  type="text" name="name_en" id="english" class="form-control @error('name_en') is-invalid @enderror" value='{{old('name_en')}}' placeholder="{{trans('client.englishname')}}">
                                @error('name_en')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="phone">{{trans('client.phone')}}</label>
                                <input required  type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" placeholder="{{trans('client.phone')}}">
                                @error('phone')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="country_id">{{trans('client.country')}}</label>
                                <select class="form-control select2" name='country_id'>
                                    <option label="إختر المدينة">
                                    </option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">
                                        {{$country->id}} -
                                        {{$country->name}}
                                    </option>
                                    @endforeach
                                </select>                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="code">{{trans('client.code')}}</label>
                                <input required  value="{{old('code')}}" type="number" name="code" id="code" class="form-control @error('code') is-invalid @enderror" placeholder="{{trans('client.code')}}">
                                @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="balance">{{trans('client.balance')}}</label>
                                <input required value="{{old('balance')}}" type="number" name="balance" id="balance" class="form-control @error('balance') is-invalid @enderror" placeholder="{{trans('client.balance')}}">
                                @error('balance')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Address">{{trans('client.address')}}</label>
                            <textarea class="form-control  @error('address') is-invalid @enderror" name="address" id="Address" rows="5" placeholder="{{trans('client.address')}}">{{old('address')}}</textarea>
                            @error('address')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">{{trans('client.save')}} </button>
                    </div>
                </form>
        </div>
    </div>
</div>
