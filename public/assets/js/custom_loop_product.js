JsBarcode(".barcode_index").init();

//========start barcode ===============//
let barcode_input = document.querySelector('#barcode');
let  category_id = document.querySelector('#category_id'),
    min = Math.ceil(Math.random()),
    max = Math.floor(Math.random()),
    data = new Date(),
    hour = data.getHours(),
    mintes = data.getMinutes(),
    secounds = data.getSeconds(),
    slogan = document.querySelector('#slogan').value.toUpperCase(),
    barcode ='';
if(barcode_input.value == null){
    category_id.addEventListener('change',function(e) {
        let catval = category_id.value,
            barcode = `${slogan}${catval}-${hour}${mintes}${secounds}${Math.floor(Math.random())}${min}${max}`;
        barcode_input.value = barcode;
        JsBarcode(".barcode",barcode, {
            height: 30,
        });
        let barcodepre = document.querySelector("#code");
        console.log(barcodepre.src)
    });
}else{
    barcode_input.addEventListener('change',function (){
        barcode = barcode_input.value;
        JsBarcode(".barcode",barcode, {
            height: 30,
        });
    });
}

//========end barcode ===============//

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

