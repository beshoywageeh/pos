<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @media print{
        @page{
        size: A4;
    margin:0.5rem;
    header:none;
    }
    }
    table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
margin-bottom: 0.5rem;
            }
            
            table tr th, table tr td {
                padding: 0.2rem;
            }
            .inv_data tr th, .inv_data tr td {
                padding: 0.2rem;
                border: 1px #4e4e4e solid !important;
            }
            .tfoot tr th, .tfoot tr td {
                font-size: 20px;
            }

            .tfoot tr th {
                text-align: right;
            }
</style>

<body>
    <table class="company_data">
        <tr>
            <td>loop labs</td>
            <td>loop labs</td>
            <td>loop labs</td>

        </tr>
    </table>
    <table class="client_data">
        <tr>
            <td>{{ $data['salesinv']->client->name }} : الاسم</td>
            <td>{{ $data['salesinv']->client->phone }} : رقم التليفون</td>
        </tr>
        <tr>
            <td colspan='2'>{{ $data['salesinv']->client->address }} : العنوان</td>
        </tr>
    </table>
    <table class="invoice_data">
        <tr>
            <td><bdi>رقم الفاتورة :</bdi> {{ $data['salesinv']->id }}</td>
            <td><bdi>رقم الفاتورة :</bdi> {{ $data['salesinv']->inv_num }}</td>
            <td><bdi>تاريخ الفاتورة :</bdi> {{ $data['salesinv']->inv_date }}</td>

        </tr>
    </table>
    <table class="inv_data">
        <thead>
            <tr>
               <th>#</th>
                <th class="wd-20p">Type</th>
                <th class="wd-40p">Description</th>
                <th class="tx-center">QNTY</th>
                <th class="tx-right">Unit Price</th>
                <th class="tx-right">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['salesinv']->products_salesinvs as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->products->name }}</td>
                    <td>Sed ut perspiciatis unde omnis iste natus error sit
                        voluptatem accusantium doloremque laudantium, totam rem aperiam...
                    </td>
                    <td>
                        {{ $item->quantity }}
                    </td>
                    <td>{{ $item->products->sales_price }} {{ env('MAIN_CURRENCY') }}</td>

                    <td>{{ number_format($item->products->sales_price * $item->quantity) }} {{ env('MAIN_CURRENCY') }}
                    </td>
                </tr>
            @endforeach
            <tr class='tfoot'>
                <th colspan="3" rowspan="4">
                    <div>
                        <label></label>
                        <p></p>
                    </div><!-- invoice-notes -->
                </th>
                <th>Sub-Total</th>
                <th colspan="2">{{ number_format($data['salesinv']->total) }}
                    {{ env('MAIN_CURRENCY') }}</th>
            </tr>
            <tr>
                <th>Tax</th>
                <th colspan="1">{{ $data['salesinv']->tax_rate }} % </th>
                <th colspan="1">{{ number_format($data['salesinv']->tax_value) }}
                    {{ env('MAIN_CURRENCY') }}</th>
            </tr>
            <tr>
                <th>Discount</th>
                <th colspan="2">-{{ $data['salesinv']->discount }}
                    {{ env('MAIN_CURRENCY') }}</th>
            </tr>
            <tr>
                <th>Total Due</th>
                <th colspan="2">
                    <h4>{{ env('MAIN_CURRENCY') }}</h4>
                </th>
            </tr>
        </tbody>

    </table>
    <script>
        window.print();
    </script>
</body>

</html>
