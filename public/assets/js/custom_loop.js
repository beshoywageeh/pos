//========start image preview===========//
function showPreview(event){
    if(event.target.files.length > 0){
        let src = URL.createObjectURL(event.target.files[0]),
            preview = document.getElementById("preview");
        preview.src = src;
    }
}
//========end image preview===========//

//========start get and set inv number===========//

let inv_num = document.querySelector('#inv_num'),
    last_pos = document.querySelector('#last').value,
    parse = parseInt(last_pos) + 1,
    slogan = document.querySelector('#slogan').value;
if(slogan == ''){
    inv_num.value = `pos-${parse}`;

}else{
    inv_num.value = `${slogan}-${parse}`;

}
let date = $('.fc-datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
}).val();
//========end get and set inv number===========//


//========start get and set invoice data===========//
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

//========end get and set invoice data===========//

//========start calculate total ===============//
$('body').on('click', '.remove-product', function(e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    calTotal();
});
$('body').on('keyup change', '.qty', function() {
    let quantity = parseFloat($(this).val()),
        price = $(this).data('price');
    $(this).closest('tr').find('.product_price').html(quantity * price);
    calTotal();
});
function calTotal() {
    let total = 0,
        prices = document.querySelectorAll('#order_list .product_price'),
        total_price = document.querySelector('#total_inv');
    for (let i = 0; i < prices.length; i++) {
        total += parseFloat(prices[i].innerHTML);
    }
    total_price.value = total;
}
//========end calculate total ===============//

//========start digital clock ===============//
setInterval(digitalClock,1000);
function digitalClock(){
    let data = new Date(),
        hour = data.getHours(),
        mintes = data.getMinutes(),
        secounds = data.getSeconds(),
        am_pm = 'ص';
    if(hour > 12){
        hour-=12;
        am_pm='م';
    }
    hour = hour < 10 ? "0" + hour : hour;
    mintes = mintes < 10 ? "0" + mintes : mintes;
    secounds = secounds < 10 ? "0" + secounds : secounds;

    let final = `${hour}:${mintes}:${secounds} ${am_pm}`;
    document.querySelector('#time').value = final;
}
digitalClock();
//========end digital clock ===============//
//========start ajax search ===============//
$(document).on('input','#search',function (e){make_search()});
function make_search(){
    var search=$("#search").val();
    var token_search=$("#token").val();
    var ajax_search_url=$("#ajax_url").val();

    jQuery.ajax({
        url:ajax_search_url,
        type:'post',
        dataType:'html',
        cache:false,
        data:{search:search,"_token":token_search},
        success:function(products){

            $("#list").html(products);
        },
        error:function(){

        }
    });
}
//========end ajax search ===============//

