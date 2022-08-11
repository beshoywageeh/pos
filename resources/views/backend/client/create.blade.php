
<div class="modal" id="Addclient">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('client.add')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
                <form action="{{route('client.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">

                   <div class="row">
                       <div class="form-group col-sm-6">
                           <label for="arabic">{{trans('client.arabicname')}}</label>
                           <input type="text" name="name" id="arabic" class="form-control @error('name') is-invalid @enderror" placeholder="{{trans('client.arabicname')}}">
                           @error('name')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>
                       <div class="form-group col-sm-6">
                           <label for="english">{{trans('client.englishname')}}</label>
                           <input type="text" name="name_en" id="english" class="form-control @error('name_en') is-invalid @enderror" placeholder="{{trans('client.englishname')}}">
                           @error('name_en')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="phone">{{trans('client.phone')}}</label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{trans('client.phone')}}">
                        @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <label for="country_id" class="mg-b-10">{{trans('client.country')}}</label>
                        <select class="form-control select2" name='country_id'>
                            <option label="إختر المدينة">
                            </option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">
                                {{$country->id}} - 
                                {{$country->city_name_ar}}
                            </option>
                            @endforeach
                            </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="Address">{{trans('client.address')}}</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="Address" rows="5" placeholder="{{trans('client.address')}}"></textarea>
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
