@foreach ($products as $product)
    <tr class='product{{ $product->id }}'>
        <td><input name="product_id[]" class="form-control form-control-sm" type='text' value='{{ $product->id }}'
                hidden>{{ $loop->iteration }}</td>
        <td>{{ $product->name }}</td>
        <td><input value="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="product_qty[]"
                onkeyup="Total_product()" data-price='{{ $product->sales_price }}'
                class="form-control form-control-sm qty"></td>
        <td>{{ $product->sales_price }}</td>
        <td class="product_price">{{ $product->sales_price }}</td>
        <td><button onclick="deleteproduct();return false;"class="btn btn-sm btn-danger delete_product"
                data-id={{ $product->barcode }}><i class="fas fa-trash"></i></button>
            <input type="hidden" id="csrf_delete" value="{{ csrf_token() }}">
            <input type="hidden" id="url_delete" value="{{ route('deleteproduct') }}">
            </form>
        </td>
    </tr>
@endforeach
