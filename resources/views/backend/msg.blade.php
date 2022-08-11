@if(session()->has('Delete'))
    <div class="alert alert-danger mg-b-0 my-2" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session()->get('Delete')}}</strong>
    </div>
@endif
@if(session()->has('Add'))
    <div class="alert alert-success mg-b-0 my-2" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session()->get('Add')}}</strong>
    </div>
@endif
@if(session()->has('Edit'))
    <div class="alert alert-success mg-b-0 my-2" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session()->get('Edit')}}</strong>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger mg-b-0 my-2" role="alert">
        <ul>
            @foreach($errors->all() as $error)
        <li>{{$error}}</li>
                @endforeach
        </ul>
    </div>
@endif
