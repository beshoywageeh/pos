$(document).keypress(function (e) {
    if (e.keyCode == 13) {
        product_submit();
        getdata();
    }
});

function product_submit() {
    let csrf = document.querySelector("#csrf").value,
        urlAdd = document.querySelector("#urladd").value,
        product_barcode = document.querySelector("#barcode"),
        product_search = document.querySelector("#product_search"),
        quantity = document.querySelector("#quantity").value,
        inv_id = document.querySelector("#inv_id").value;
    /*if (product_barcode.value || product_search.value === null) {
        alert("يرجي التأكد من إضافة المنتج");
        return false;
    }*/
    if (product_barcode.value != "") {
        barcode = product_barcode.value;
        // return false;
    }
    if (product_search.value != "no") {
        barcode = product_search.value;
        //    return false;
    }
    $.ajax({
        method: "POST",
        url: urlAdd,
        data: {
            barcode: barcode,
            inv_id: inv_id,
            quantity: quantity,
            _token: csrf,
        },
        success: function (data, status) {
            $("#barcode").val("");
            $("#quantity").val(1);
            //    $("#product_search").val("");
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
