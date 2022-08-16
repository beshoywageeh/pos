@extends('layouts.master') @section('title') {{trans('sales.title')}} @endsection
 @section('css')
 @livewireStyles
 @endsection
<!-- Content Header (Page header) -->
@section('content')
<!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('sales.title')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('sales.main')}}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title mg-b-0">{{trans('sales.title')}}</h4>
                        </div>
                    </div>
                </div>

            <hr>
           

                <form action="{{route('sales.store')}}" method="post">
                    @method ('post')@csrf
                    <div class="card-body"  id="print_area">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="text" id='last' hidden value="{{$ex[1]}}">
                    <div class="row">
                        <div class="col-lg-2" id='inv_data'>
                            <label for="inv_num">رقم الفاتورة</label>
                            <input type="text" id="inv_num" class="form-control form-control-sm" name='inv_num' readonly>
                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <label class="mg-b-10">اختر العميل</label>
                            <select class="form-control form-control-sm select2" name="client">
                                <option label="Choose one">
                                </option>
                                @foreach($clients as $client)
                                <option value="{{$client->id}}">
                                    {{$client->name}}
                                </option>
                                @endforeach
                                </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="date">التاريخ</label>
                            <input type="date" class="form-control form-control-sm" name='date' value="{{date("Y-m-d")}}" >
                        </div>
                        <div class="col-lg-2">
                            <label for="time">الساعه</label>
                            <input type="time" class="form-control form-control-sm"/>
                        </div>
                    </div>
                    <livewire:salesinv/>
                    <div class="col-xl-12">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="order_list" name="products_list">
                                <tr id="0">
                                    <td><input name='product_id[0]' class="form-control form-control-sm" type='text' value=""></td>
                                    <td></td>
                                    <td><input name='product_price[0]' class="form-control form-control-sm price" value="" readonly></td>
                                    <td><input class="form-control form-control-sm qty" type='text' name="product_qty[0]" value='1'></td>
                                    <td><input name='product_total' readonly class="form-control form-control-sm total"  value="" id=""></td>
                                    <td><button class="btn btn-danger btn-sm btn-rounded delete"><i class="fas fa-times"></i></button></td>
                            </tr>
                            </tbody>
                            </table>
                      </div>
                      <div class="row mt-3">
                        <div class="col-sm-2">  <label>اجمالي الفاتورة</label>
                        </div>
                        <div class="col-sm-6">  <input class="form-control form-control-sm" id="total-inv" name='total_inv' readonly>
                        </div>
                        </div>
                    </div>
                    <div class=card-footer>
            <button class="btn btn-success tx-15 tx-bold" type="submit">حفظ<i class="mr-2 fa fa-save"></i></button>
                    </div>
                </form>


        </div>
    </div>
@include('backend.Salesinv.getproducts')   
    @endsection
@section('js')
@livewireScripts
<script type="text/javascript">
    let inv_num = document.querySelector('#inv_num'),
    main = 'pos-',
    last_pos = document.querySelector('#last').value,
    parse = parseInt(last_pos) + 1;
    inv_num.value = main + parse;
    let date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
        }).val();
</script>
<script>
    //Store Data Insession
    let product_list=[],
    total_price = document.querySelector('#total-inv'),
    productid = document.querySelector('#productid');
    Livewire.on('change',function(){
        let product_data = document.querySelector('#productget');
        product_list.push(product_data.textContent);
        window.sessionStorage.setItem('products',JSON.stringify(product_list)),
            //Get Data From Session
        getproducts = window.sessionStorage.getItem('products'),
        parsing= JSON.parse(getproducts),
        list=document.querySelector('#order_list'),
        products =[],
        prices = 0;
        list.innerHTML='';
        //Add Data to Page
        for(i=0;i<=product_list.length;i++){
            products.push(JSON.parse(parsing[i]));
            let row =`<tr id="${i}">
                            <td><input name='product_id[${i}]' class="form-control form-control-sm" type='text' value="${products[i].id}"></td>
                            <td>${products[i].name.ar}</td>
                            <td><input name='product_price[${i}]' class="form-control form-control-sm price" value="${parseInt(products[i].price)} EGP" readonly></td>
                            <td><input class="form-control form-control-sm qty" type='text' id='product_qty${products[i].id}' name="product_qty[${i}]" value='1'></td>
                            <td><input name='product_total' readonly class="form-control form-control-sm total"  value="" id="total_${products[i].id}"></td>
                            <td><span  class="btn btn-danger btn-sm btn-rounded delete" data-id="${products[i].id}"><i class="fas fa-times"></i></span></td>
                    </tr>`;
                    list.innerHTML+=row;
                    prices+=parseInt(products[i].price);
                    total_price.value=prices;
                          }
    });
    </script>
    <script>
        document.addEventListener('click', function(e){
            //   e.preventDefault();
            let id = e.target.getAttribute('data-id')
            if(e.target.classList.contains('delete')){
                //console.log(e.target.getAttribute('data-id'));
                product_list = product_list.indexOf(p => p == id);
                console.log(product_list);
                window.sessionStorage.setItem('products',JSON.stringify(product_list));
    e.target.parentNode.parentNode.remove();
}
    });


</script>
@endsection
