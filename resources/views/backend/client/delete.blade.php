
<div class="modal" id="Deleteclient{{$client->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('client.delete')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
                <form action="{{route('client_destroy','test')}}" method="POST" autocomplete="off">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">

                    <input name="id" value="{{$client->id}}" type="hidden"/>
                   <div class="row ">
                       <div class="col-sm m-auto">
                           <h3 class="text-danger">{{trans('client.delconfirm')}}</h3>
                       </div>
                   </div>
                    <div class="row my-2">
                        <div class="col-sm m-auto">
                            <input class="form-control" type="text" readonly value="{{$client->name}}">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn ripple btn-danger-gradient" type="submit">{{trans('client.delete')}} </button>
                    </div>
                </form>

        </div>
    </div>
</div>
