<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Traits\SettingTrait;
use App\Models\category;
use App\Models\product;
use App\Models\product_salesinv;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use SettingTrait;

    public function index()
    {
        $products = product::with('category')->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        try {
            $cats = category::get();

            return view('backend.products.create', compact('cats'), $this->GetData());
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request, ToastrFactory $flasher)
    {
        //StoreProductRequest
       // return $request;
        try {
            product::create([
                'name' => [
                    'ar' => $request->name,
                    'en' => $request->name_en],
                'barcode' => $request->barcode,
                'category_id' => $request->category_id,
                'opening_balance' => $request->opening_balance,
                'purchase_price' => $request->purchase_price,
                'sales_price' => $request->sales_price,
                'sales_unit' => $request->sales_unit,
                'purchase_unit' => $request->purchase_unit,
                'notes' => $request->notes,
            ]);
            $flasher->addSuccess(trans('general.add_msg'));

            return redirect()->route('product_index');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(product $product)
    {
        //
    }

    public function edit(product $product)
    {
        // return $product;
        $cats = category::all();
        return view('backend.products.edit', compact('product', 'cats'));
    }

    public function update(Request $request, ToastrFactory $flasher)
    {
        try {
            $product = product::findorfail($request->id);
            $product->update([
                'name' => [
                    'ar' => $request->name, 'en' => $request->name_en],

                'category_id' => $request->category_id,
                'purchase_price' => $request->purchase_price,
                'sales_price' => $request->sales_price,
                'sales_unit' => $request->sales_unit,
                'purchase_unit' => $request->purchase_unit,
                'notes' => $request->notes,
            ]);
            $flasher->AddInfo(trans('general.edit_msg'));

            return redirect()->route('product_index');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, ToastrFactory $flasher)
    {
        try {
            $count = product_salesinv::where('product_id', $request->id)->count();
            if ($count == 0) {
                product::destroy($request->id);
                $request->session()->put('info', trans('general.delete_msg'));
            } else {
                $request->session()->put('error', trans('product.canotdelete'));
            }

            return redirect()->route('product_index');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
