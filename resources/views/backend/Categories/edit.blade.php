<div class="modal" id="EditCategory{{$cat->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('category.edit')}}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
                <form action="{{route('category_update','test')}}" method="POST" autocomplete="off">
                    @csrf @method('PUT')
                    <div class="modal-body">

                    <input type="hidden" name="id" value="{{$cat->id}}" />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="arabic">{{trans('category.arabicname')}}</label>
                            <input type="text" name="name" id="arabic" value="{{$cat->getTranslation('name','ar')}}" class="form-control @error('name') is-invalid @enderror" placeholder="{{trans('category.arabicname')}}" />
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="english">{{trans('category.englishname')}}</label>
                            <input type="text" name="name_en" value="{{$cat->getTranslation('name','en')}}" id="english" class="form-control @error('name_en') is-invalid @enderror" placeholder="{{trans('category.englishname')}}" />
                            @error('name_en')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Note">{{trans('category.note')}}</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="Note" rows="5" placeholder="{{trans('category.note')}}">{{$cat->notes}}</textarea>
                        @error('notes')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
            </div>
                    <div class="modal-footer">
                    <button class="btn ripple btn-warning-gradient" type="submit">{{trans('category.edit')}}</button>
                    </div>
                </form>

        </div>
    </div>
</div>
