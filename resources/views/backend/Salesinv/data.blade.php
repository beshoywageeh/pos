@foreach ($ids as $product)
    <tr class='product{{ $product->id }}'>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->products->name }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->products->sales_price }}</td>
        <td class="product_price">
            {{ $product->quantity * $product->products->sales_price }}
        </td>
        <td>
            <button onclick="deleteproduct();return false;"class="btn btn-sm btn-danger delete_product"
                data-id={{ $product->barcode }}>
                <i class="fas fa-trash"></i>
            </button>
            <input type="hidden" id="csrf_delete" value="{{ csrf_token() }}">
            <input type="hidden" id="url_delete" value="{{ route('salesinvoice_deleteproduct') }}">
        </td>
    </tr>
@endforeach
