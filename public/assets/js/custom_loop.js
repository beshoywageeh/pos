//========start get and set inv number===========//

let inv_num = document.querySelector('#inv_num'),
    last_pos = document.querySelector('#last').value,
    parse = parseInt(last_pos) + 1,
    slogan = document.querySelector('#slogan').value;
if (slogan == '') {
    inv_num.value = `pos-${parse}`;

} else {
    inv_num.value = `${slogan}-${parse}`;

}
let date = $('.fc-datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
}).val();
//========end get and set inv number===========//


//========end get and set invoice data===========//
function calTotal() {
    let total = 0,
        prices = document.querySelectorAll('#order_list .product_price'),
        discount = document.querySelector('#discount'),
        tax_value = document.querySelector('#tax_value').value,
        total_price = document.querySelector('#total_inv');
    for (let i = 0; i < prices.length; i++) {
        total += parseFloat(prices[i].innerHTML);
        total_price.value=total-discount.value
    }
}

//========end calculate total ===============//

//========start digital clock ===============//
setInterval(digitalClock, 1000);

function digitalClock() {
    let data = new Date(),
        hour = data.getHours(),
        mintes = data.getMinutes(),
        secounds = data.getSeconds(),
        am_pm = 'ص';
    if (hour > 12) {
        hour -= 12;
        am_pm = 'م';
    }
    hour = hour < 10 ? "0" + hour : hour;
    mintes = mintes < 10 ? "0" + mintes : mintes;
    secounds = secounds < 10 ? "0" + secounds : secounds;

    let final = `${hour}:${mintes}:${secounds} ${am_pm}`;
    document.querySelector('#time').value = final;
}

digitalClock();
//========end digital clock ===============//
$(function () {
    let csrf = document.querySelector("#csrf").value,
        urlAdd = document.querySelector("#urladd").value;
    $("#barcode").on("keyup change", function (e) {
        e.preventDefault();
        let barcode = document.querySelector("#barcode").value;
        $.ajax({
            method: "POST",
            url: urlAdd,
            data: { barcode: barcode, _token: csrf },
            success: function (data, status) {
                $("#barcode").val("");
                flasher.success(data.msg);
            },
        });
        getdata();
    });
});

function getdata() {
    let orderList = document.querySelector("#order_list"),
        getData = document.querySelector("#getData").value;
    $.ajax({
        method: "GET",
        url: getData,
        datatype: "html",
        cache: false,
        success: function (data) {
            $("#order_list").html(data);
            calTotal();
        },
    });
}

function deleteproduct(id) {
    let csrf_delete = document.querySelector("#csrf_delete").value,
        urlDelete = document.querySelector("#url_delete").value;
    $.ajax({
        method: "POST",
        url: urlDelete,
        cache: false,
        data: { id: id, _token: csrf_delete },
        success: function (data) {
            if (data.status == true) {
                flasher.error(data.msg);
            }
        },
    });
    $("body").on("click", ".delete_product", function () {
        $(this).closest("tr").remove();
        calTotal();
    });
}

function showPreview(event) {
    if (event.target.files.length > 0) {
        let src = URL.createObjectURL(event.target.files[0]),
            preview = document.getElementById("preview");
        preview.src = src;
    }
}



function Total_product() {
    $('body').on('keyup', '.qty', function () {
        let qty = parseFloat($(this).val()),
            prices = parseFloat($(this).data('price'));
        $(this).closest('tr').find('.product_price').html(qty * prices);
        calTotal()
    });
}
