<div class="dataTables-filter my-5 mx-auto">
  <div class="row">
    <div class="col-xl-10">
      <input type="search" wire:model="getproduct"  id="productid" class="form-control form-control-lg" placeholder="اضف منتج" value="" autocomplete="off">
    </div>
    <div class="col-xl-2">
      <button class="btn btn-primary btn-rounded" data-target="#GetProducts" type="button" data-toggle="modal"><i class="fa fa-search"></i></button>
    </div>
  </div>
  <label id='productget' style="display:none">{{$product}}</label>
</div>