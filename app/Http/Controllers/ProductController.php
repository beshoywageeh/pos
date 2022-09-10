<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrFactory;

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

    public function store(StoreProductRequest $request,ToastrFactory $flasher)
    {
        // dd($request);
        try {

            product::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'price' => $request->price,
                'barcode' => $request->barcode,
                'category_id' => $request->category_id,
                'notes' => $request->notes,
            ]);
            $flasher->addSuccess(trans('general.add_msg'));
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

    public function update(StoreProductRequest $request,ToastrFactory $flasher)
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
            $flasher->AddSuccess(trans('general.edit_msg'));

            return redirect('product');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request,ToastrFactory $flasher)
    {
        try {
            product::destroy($request->id);
            $flasher->AddSuccess(trans('general.delete_msg'));

            return redirect('product');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function product_search(Request $request)
    {
        if($request->ajax()){
            $products =  product::where('id', 'LIKE','%'.$request->search.'%')->get();
            return view('backend.products.search',compact('products'));
        }

    }
}
