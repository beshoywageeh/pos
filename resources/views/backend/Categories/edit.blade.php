<div class="modal fade" id="EditCategory">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{ trans('category.edit') }}</h3>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('category_update', 'test') }}" method="POST" autocomplete="off">
                @csrf @method('POST')
                <div class="modal-body">

                    <input type="hidden" name="id" id="pro_id" value="" />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="arabic">{{ trans('category.arabicname') }}</label>
                            <input type="text" name="name" id="name_ar" value=""
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ trans('category.arabicname') }}" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="english">{{ trans('category.englishname') }}</label>
                            <input type="text" name="name_en" value="" id="name_en"
                                class="form-control @error('name_en') is-invalid @enderror"
                                placeholder="{{ trans('category.englishname') }}" />
                            @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Note">{{ trans('category.note') }}</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="note" rows="5"
                            placeholder="{{ trans('category.note') }}">

                        </textarea>
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning"
                        type="submit">{{ trans('category.edit') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
