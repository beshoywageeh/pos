<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
*{text-align: center;margin:auto}
  tr,
    td {
        border: 1px solid black;
    }
    th{
        color: white;
        background-color: black;
        margin:2px
    }
</style>

<body>
    <table class="inv_data" style="width: 100%">
        <tr>
            <td>{{ $data->client->name }}</td>
        </tr>
        <tr>
            <td>{{ $data->client->address }}</td>
            <td>{{ $data->inv_num }}</td>

        </tr>
        <tr>
            <td>{{ $data->client->phone }}</td>
            <td>{{ $data->inv_date }}</td>

        </tr>
        <tr>
            <td>{{ $data->client->country->name }}</td>
        </tr>
    </table>
    <table class="inv_data">
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
            @foreach ($data->products_salesinvs as $item)
                <tr>
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
            <tr>
                <td colspan="2" rowspan="4">
                    <div>
                        <label></label>
                        <p></p>
                    </div><!-- invoice-notes -->
                </td>
                <td>Sub-Total</td>
                <td colspan="2">{{ number_format($data->total) }}
                    {{ env('MAIN_CURRENCY') }}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td colspan="1">{{ $data->tax_rate }} % </td>
                <td colspan="1">{{ number_format($data->tax_value) }}
                    {{ env('MAIN_CURRENCY') }}</td>
            </tr>
            <tr>
                <td>Discount</td>
                <td colspan="2">-{{ $data->discount }}
                    {{ env('MAIN_CURRENCY') }}</td>
            </tr>
            <tr>
                <td>Total Due</td>
                <td colspan="2">
                    <h4>{{ env('MAIN_CURRENCY') }}</h4>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
