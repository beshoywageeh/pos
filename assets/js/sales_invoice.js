
 $('.select2').select2();
 $(document).keypress(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();

            product_submit();
        }
     setInterval(getdata(),10000);

        clearInterval();
    });
let sales_inv_id = document.querySelector('#sales_id').value;
    function product_submit() {
        let csrf = document.querySelector("#csrf").value,
            urlAdd = document.querySelector("#urladd").value,
            quantity = document.querySelector("#quantity").value,
            sales_inv_id = document.querySelector("#sales_id").value,
            barcode = document.querySelector("#product_search").value;
        axios.post(urlAdd, {
            barcode: barcode,
            quantity:quantity,
            inv_id:sales_inv_id,
            _token: csrf
        })
            .then(function (response) {
                $("#product_search").val("");
                $('.select2').select2();
                $('#quantity').val('1');

                flasher.success(response.data.msg);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
    function getdata() {

        let orderList = document.querySelector("#order_list"),
            csrf_get=document.querySelector('#csrf_get').value,
            getData = document.querySelector("#getData").value;

        axios.post(getData, {

            inv_id:sales_inv_id,
            _token: csrf_get
        },{
            responseType: 'html'
            ,cache:false,
        })
            .then(function (response) {
                $("#order_list").html(response.data);

            })
            .catch(function (error) {
                console.log(error);
            });
    }
    function deleteproduct() {
        let csrf_delete = document.querySelector("#csrf_delete").value,
            urlDelete = document.querySelector("#url_delete").value,
            id = $(this).data("id");
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
        });

    }
