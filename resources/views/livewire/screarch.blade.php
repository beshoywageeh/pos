<div id="example_filter" class="dataTables_filter">
    <label><input type="search" wire:model="getclient" class="form-control" placeholder="Search..." aria-controls="example" /></label>
</div>
<div class="table-responsive">
                    <table class="table table-bordered table-striped text-md-nowrap text-center tx-15 tx-bold">
                        <thead>
                        <tr >
                            <th class="wd-2">كود</th>
                            <th>{{trans('client.name')}}</th>
                            <th>{{trans('client.phone')}}</th>
                            <th>{{trans('client.address')}}</th>
                            <th style="width: 1rem;">{{trans('client.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr role="row">
                                <td>{{$client->id}}</td>
                                <td><a href="{{route('client.show',['client'=>$client->id])}}">{{$client->name}}</a></td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->address}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-gray-700" data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <button class="dropdown-item bg-danger text-white tx-15" data-target="#Deleteclient{{$client->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-delete mr-2"></i>{{trans('client.delete')}}
                                            </button>
                                            <button class="dropdown-item bg-warning text-white tx-15" data-target="#Editclient{{$client->id}}" data-toggle="modal" aria-controls="example" type="button">
                                                <i class="typcn typcn-edit mr-2"></i> {{trans('client.edit')}}
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
</div>                