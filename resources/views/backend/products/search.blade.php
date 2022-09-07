@if(@isset($products) && !@empty($products))
    <div class="table-responsive"  id="list">
        <table class="table table-bordered table-striped mg-b-0 text-md-nowrap text-center tx-15 tx-bold">
            <thead>
            <tr role="row">
                <th class="wd-2">#</th>
                <th>{{ trans('product.name') }}</th>
                <th>{{ trans('product.price') }}</th>
                <th>{{ trans('product.category') }}</th>
                <th>{{ trans('product.note') }}</th>
                <th style="width: 1rem;">{{ trans('product.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr role="row" >
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->notes }}</td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                    class="btn ripple btn-gray-700" data-toggle="dropdown"
                                    id="dropdownMenuButton" type="button"><i
                                    class="fas fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                <button class="dropdown-item bg-danger text-white tx-15"
                                        data-target="#DeleteProduct{{ $product->id }}" data-toggle="modal"
                                        aria-controls="example" type="button">
                                    <i class="typcn typcn-delete mr-2"></i>{{ trans('general.delete') }}
                                </button>
                                <button class="dropdown-item bg-warning text-white tx-15"
                                        data-target="#EditProduct{{ $product->id }}" data-toggle="modal"
                                        aria-controls="example" type="button">
                                    <i class="typcn typcn-edit mr-2"></i> {{ trans('general.edit') }}
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @include('backend.Products.edit') @include('backend.Products.delete') @empty
                <tr>
                    <td class="text-center" colspan="6">{{ trans('product.msg') }}</td>
                </tr>
            @endforelse
            </tbody>

@endif
