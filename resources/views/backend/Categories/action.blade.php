<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true"
            class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
            id="dropdownMenuButton" type="button">{{trans('category.actions')}} <i
            class="fas fa-caret-down my-1"></i></button>
    <div class="dropdown-menu">
        <button class="dropdown-item edit" data-id="{{$id}}" data-target="#DeleteCategory"
                data-toggle="modal" aria-controls="example" type="button">
            <i class="fa fa-trash mx-2 text-danger"></i>{{trans('category.delete')}}
        </button>
        <button class="dropdown-item" data-target="#EditCategory{{$id}}"
                data-toggle="modal" aria-controls="example" type="button">
            <i class="fa fa-edit mx-2 text-warning"></i> {{trans('category.edit')}}
        </button>
    </div>
</div>


