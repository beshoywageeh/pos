
<div class="modal" id="AddCategory">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('general.add')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
                <form action="{{route('product.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">

                   <div class="row">
                       <div class="form-group col-sm-6">
                           <label for="arabic">{{trans('product.arabicname')}}</label>
                           <input type="text" name="name" id="arabic" class="form-control @error('name') is-invalid @enderror" placeholder="{{trans('product.arabicname')}}">
                           @error('name')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>
                       <div class="form-group col-sm-6">
                           <label for="english">{{trans('product.englishname')}}</label>
                           <input type="text" name="name_en" id="english" class="form-control @error('name_en') is-invalid @enderror" placeholder="{{trans('product.englishname')}}">
                           @error('name_en')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>
                   </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="price">{{trans('product.price')}}</label>
                                <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="{{trans('product.price')}}">
                                @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                @php {{$categories = \App\Models\category::all(); }} @endphp
                                <label for="category">{{trans('product.category')}}</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="" disabled selected>{{trans('product.chcat')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="Note">{{trans('product.note')}}</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="Note" rows="5" placeholder="{{trans('product.note')}}"></textarea>
                        @error('notes')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    </div>
<div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">{{trans('general.save')}} </button>
</div>
                </form>
        </div>
    </div>
</div>
