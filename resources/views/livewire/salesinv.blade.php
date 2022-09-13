<div class="dataTables-filter my-5 mx-auto">
  <div class="row">
    <div class="col-xl-11">
      <input type="search" wire:model="getproduct"  id="productid" class="form-control" placeholder="{{trans('invoice.add_product')}}" value="" autocomplete="off">
    </div>
  </div>
  <div class="table-responsive mt-2 col-xl-11">
    <table class="table table-bordered table-striped text-md-nowrap text-center tx-bold">
        <thead>
            <tr role="row">
                <th class="wd-2">#</th>
                <th>{{ trans('product.name') }}</th>
                <th>{{ trans('product.sales_price') }}</th>
                <th>{{ trans('product.add') }}</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr role="row">
                    <th class="wd-2">#</th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->sales_price }}</th>
                    <th><a href="" id="product-{{ $product->id }}"
                            class='btn btn-success btn-sm add-product'
                            data-id='{{ $product->id }}' data-name='{{ $product->name }}'
                            data-price='{{ $product->sales_price }}'><i class='fa fa-plus'></i></a>
                    </th>

                </tr>
                @empty
                <tr>
                  <th colspan="4"><span class="text-muted"> {{trans('product.msg')}}</span>

                  </th>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

</div>
