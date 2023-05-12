$(document).keypress(function (e) {
    if (e.keyCode == 13) {
        product_submit();
        getdata();
    }
});

function product_submit() {
    let csrf = document.querySelector("#csrf").value,
        urlAdd = document.querySelector("#urladd").value,
        barcode = document.querySelector("#barcode").value,
        inv_id = document.querySelector("#inv_id").value;
    $.ajax({
        method: "POST",
        url: urlAdd,
        data: { barcode: barcode, inv_id: inv_id, _token: csrf },
        success: function (data, status) {
            $("#barcode").val("");
            flasher.success(data.msg);
        },
    });
}
function getdata() {
    let token = document.querySelector("#csrf_get").value,
        orderList = document.querySelector("#order_list"),
        getData = document.querySelector("#getData").value,
        invoice = document.querySelector("#inv_id").value;
    $.ajax({
        method: "POST",
        url: getData,
        data: { inv_id: invoice, _token: token },
        datatype: "html",
        cache: false,
        success: function (data) {
            $("#order_list").html(data);
            calTotal();
        },
    });
}
function deleteproduct() {
    let csrf_delete = document.querySelector("#csrf_delete").value,
        urlDelete = document.querySelector("#url_delete").value,
        id = $(this).data("id");
    $.ajax({
        method: "get",
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
    });
    calTotal();
}

function showPreview(event) {
    if (event.target.files.length > 0) {
        let src = URL.createObjectURL(event.target.files[0]),
            preview = document.getElementById("preview");
        preview.src = src;
    }
}

function Total_product() {
    $("body").on("keyup", ".qty", function () {
        let qty = parseFloat($(this).val()),
            prices = parseFloat($(this).data("price"));
        $(this)
            .closest("tr")
            .find(".product_price")
            .html(qty * prices);
        calTotal();
    });
}
function calTotal() {
    let total = 0,
        prices = document.querySelectorAll("#order_list .product_price"),
        discount = document.querySelector("#discount"),
        tax_value = document.querySelector("#tax_value").value,
        total_price = document.querySelector("#total_inv");
    for (let i = 0; i < prices.length; i++) {
        total += parseFloat(prices[i].innerHTML);
        total_price.value = total - discount.value;
    }
}
