@extends('layouts.master') @section('title')
    {{ trans('sales.title') }}
@endsection
@section('css')
    @livewireStyles
@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('sales.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('sales.main') }}</span>
            </div>
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">

        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title mg-b-0">{{ trans('sales.title') }}</h4>
                    </div>
                </div>
            </div>

            <hr>


            <form action="{{ route('sales.store') }}" method="post">
                @method ('post')@csrf
                <div class="card-body" id="print_area">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="text" id='last' hidden value="{{ $ex[1] }}">
                    <div class="row">
                        <div class="col-lg-2" id='inv_data'>
                            <label for="inv_num">{{ trans('sales.inv_num') }}</label>
                            <input type="text" id="inv_num" class="form-control form-control-sm" name='inv_num' readonly>
                        </div>
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <label class="mg-b-10">{{ trans('client.chooseclient') }}</label>
                            <select class="form-control form-control-sm select2" name="client">
                                <option label="Choose one">
                                </option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="date">التاريخ</label>
                            <input type="date" class="form-control form-control-sm" name='date'
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-lg-2">
                            <label for="time">الساعه</label>
                            <input type="time" class="form-control form-control-sm" />
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <livewire:salesinv />
                            
                        </div>
                        <div class='col-lg-6 my-5'>
                            <div class="col-xl-12">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order_list" name="products_list">

                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6 d-flex justify-content-center align-items-center text-center">
                                    <label>{{ trans('invoice.totalinvocie') }}</label>
                                    <input class="form-control form-control-sm mx-2" id="total_inv" name='total_inv'
                                        readonly>
                                    <span class='d-inline'>{{ env('MAIN_CURRENCY') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=card-footer>
                    <button class="btn btn-success tx-15 tx-bold" type="submit">حفظ<i class="mr-2 fa fa-save"></i></button>
                </div>
            </form>


        </div>
    </div>
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
        let add_product = document.querySelectorAll('.add-product');
        for (let i = 0; i < add_product.length; i++) {
            add_product[i].addEventListener('click', function(e) {
                e.preventDefault();
                let product_id = e.target.getAttribute('data-id'),
                    product_name = e.target.getAttribute('data-name'),
                    product_price = e.target.getAttribute('data-price'),
                    html = `
            <tr>
                <td><input hidden name="product_id[]" type='text' value='${product_id}'></td>
                <td>${product_id}</td>
                <td>${product_name}</td>
                <td><input class="form-control form-control-sm qty" data-price="${product_price}" type='text' name="product_qty[]" value='1'></td>
                <td class="product_price">${product_price}</td>
                <td><a class="btn btn-danger btn-sm remove-product"><i class="fa fa-trash"></i></a></td>
            </tr>
     `,
                    order_list = document.querySelector("#order_list");
                order_list.innerHTML += html;
                calTotal();
            });
        }
    </script>
    <script>
        $('body').on('click', '.remove-product', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            calTotal();
        });
        $('body').on('keyup chage', '.qty', function() {
            let quantity = parseFloat($(this).val()),
                price = $(this).data('price');
            $(this).closest('tr').find('.product_price').html(quantity * price);
            calTotal();
        });
    </script>
    <script>
        function calTotal() {
            let total = 0,
                prices = document.querySelectorAll('#order_list .product_price'),
                total_price = document.querySelector('#total_inv');
            for (let i = 0; i < prices.length; i++) {
                total += parseFloat(prices[i].innerHTML);
            }
            total_price.value = total;
        }
    </script>
@endsection
