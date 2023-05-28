JsBarcode(".barcode_index").init();

//========start barcode ===============//
let barcode_input = document.querySelector("#barcode"),
    barcode_generate = document.querySelector("#generate_barcode"),
    barcode = "";
barcode_generate.addEventListener("click", function (e) {
    e.preventDefault();
    generate_barcode();
});

barcode_input.addEventListener("change", function (e) {
    if (barcode_input.value != "") {
        barcode = barcode_input.value;
        JsBarcode(".barcode", barcode, {
            height: 30,
        });
    }
});
function generate_barcode() {
    data = new Date();
    hour = data.getHours();
    mintes = data.getMinutes();
    secounds = data.getSeconds();
    barcode = `sku-` + hour + mintes + secounds;
    barcode_input.value = barcode;
    JsBarcode(".barcode", barcode, {
        height: 30,
    });
}
//========end barcode ===============//

sale.addEventListener("change", function () {
    //alert("test");
    let salePrice = document.querySelector("#sales_price").value,
        purcahsePrice = document.querySelector("#purchase_price").value;
    if (salePrice == purcahsePrice) {
        alert("لا يمكن ان يساوي سعر الشراء سعر البيع");
        salePrice.focus();
        return false;
    }
    if (salePrice < purcahsePrice) {
        alert("لا يمكن ان يكون سعر البيع اقل من  سعر الشراء");
        salePrice.focus();
        return false;
    }
});
