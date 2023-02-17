<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Traits\SettingTrait;
use App\Models\category;
use App\Models\product;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use SettingTrait;

    public function index()
    {
        $products = product::all();

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

    public function store(StoreProductRequest $request, ToastrFactory $flasher)
    {
        try {
            product::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'barcode' => $request->barcode,
                'category_id' => $request->category_id,
                'opening_balance' => $request->opening_balance,
                'purchase_price' => $request->purchase_price,
                'sales_price' => $request->sales_price,
                'notes' => $request->notes,
            ]);
            $flasher->addSuccess(trans('general.add_msg'));

            return redirect()->back();
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
        //
    }

    public function update(StoreProductRequest $request, ToastrFactory $flasher)
    {
        $product = product::findorfail($request->id);
        try {
            $product->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'price' => $request->price,
                'barcode' => $request->barcode,
                'category_id' => $request->category_id,
                'notes' => $request->notes,
            ]);
            $flasher->AddInfo(trans('general.edit_msg'));

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, ToastrFactory $flasher)
    {
        try {
            product::destroy($request->id);
            $flasher->AddError(trans('general.delete_msg'));

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
