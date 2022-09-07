<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::paginate(10);

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        // dd($request);
        try {
            product::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'price' => $request->price,
                'category_id' => $request->category_id,
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('product.Add'));

            return redirect('product');
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

    public function update(StoreProductRequest $request)
    {
        $product = product::findorfail($request->id);
        try {
            $product->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'price' => $request->price,
                'category_id' => $request->category_id,
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('product.edit'));

            return redirect('product');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            product::destroy($request->id);
            toastr()->success(trans('product.delete'));

            return redirect('product');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
