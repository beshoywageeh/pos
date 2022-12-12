<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> طباعة فاتورة مبيعات </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <style>
        td {
            font-size: 15px !important;
            text-align: center;
        }

        #invoice_info,
        .invoice_data {
            width: 100vw;

            text-align: center;
            margin: 1rem auto;
            border: 0 !important;
        }

        .invoice_data {
            display: flex;
            justify-content: space-around;
        }

        #invoice_info td,
        th,
        thead {
            border: 1px solid black !important;
        }

        @media print {

            html,
            body {
                margin: 0;
                padding: 0;
            }

            #print_bottom {
                display: none;
            }

            .invoice_data {
                margin: 1rem auto;
                padding: 0;
            }
        }
    </style>
</head>

<body></body>
<div class="row row-sm" id='print'>
    <div class="col-12">
        <div class="invoice-header invoice_data">
            <table>
                <tr>
                    <td>
                        <img src="{{ URL::asset('assets/img/') . '/' . $data['photo'] }}" width="70vw" alt="">
                    </td>
                </tr>

            </table>
            <table>
                <tr>
                    <td><span>Invoice No</span> <span>{{ $inv->inv_num }}</span></td>

                </tr>
                <tr>
                    <td><span>Date Created:</span> <span>{{ $inv->inv_date }}</span></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>{{ $inv->client->name }}</td>
                </tr>
                <tr>
                    <td>{{ $inv->client->address }}
                    </td>
                </tr>
                <tr>
                    <td> Tel No: {{ $inv->client->phone }}
                    </td>
                </tr>
                <tr>
                    <td>Country: {{ $inv->client->country->name }}</td>
                </tr>
            </table>
        </div><!-- invoice-header -->

    </div>
</div>
<div class="">
    <table class="table table-invoice border text-md-nowrap mb-0" id="invoice_info">
        <thead>
            <tr>
                <th class="wd-20p">Type</th>
                <th class="wd-40p">Description</th>
                <th class="tx-center">QNTY</th>
                <th class="tx-right">Unit Price</th>
                <th class="tx-right">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inv->products as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td class="tx-left">Sed ut perspiciatis unde omnis iste natus error sit
                        voluptatem accusantium doloremque laudantium, totam rem aperiam...
                    </td>
                    <td class="tx-center">
                        {{ \App\Models\product_salesinv::where('salesinv_id', $inv->id)->where('product_id', $item->id)->pluck('quantity')->first() }}
                    </td>
                    <td class="tx-right">{{ $item->sales_price }} {{ env('MAIN_CURRENCY') }}</td>

                    <td class="tx-right">
                        {{ number_format($item->sales_price *\App\Models\product_salesinv::where('salesinv_id', $inv->id)->where('product_id', $item->id)->pluck('quantity')->first()) }}
                        {{ env('MAIN_CURRENCY') }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="valign-middle" colspan="2" rowspan="4">
                    <div class="invoice-notes">
                        <label class="main-content-label tx-13"></label>
                        <p></p>
                    </div><!-- invoice-notes -->
                </td>
                <td class="tx-right">Sub-Total</td>
                <td class="tx-right" colspan="2">{{ number_format($inv->total) }}
                    {{ env('MAIN_CURRENCY') }}</td>
            </tr>
            <tr>
                <td class="tx-right">Tax</td>
                <td class="tx-right" colspan="1">{{ $inv->tax_rate }} % <i class="fa fa-arrow-right"></i></td>
                <td class="tx-right" colspan="1">{{ number_format($inv->tax_value) }}
                    {{ env('MAIN_CURRENCY') }}</td>
            </tr>
            <tr>
                <td class="tx-right">Discount</td>
                <td class="tx-right" colspan="2">-{{ $inv->discount }}
                    {{ env('MAIN_CURRENCY') }}</td>
            </tr>
            <tr>
                <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                <td class="tx-right" colspan="2">
                    <h4 class="tx-primary tx-bold">{{ env('MAIN_CURRENCY') }}</h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
        window.print();

</script>
</body>

</html>
