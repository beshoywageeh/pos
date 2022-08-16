<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();

        return view('backend.Categories.index', compact('categories'));
    }

    public function create()
    {
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            category::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('category.Add'));

            return redirect('category');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(category $category)
    {
        //return $category->id;
        $products = product::where('category_id', $category->id)->get();

        return view('backend.Categories.show', compact('category', 'products'));
    }

    public function edit(category $category)
    {
        try {
            category::findorfail($category);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StoreCategoryRequest $request)
    {
        $cat = category::findorfail($request->id);
        try {
            $cat->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('category.edit'));

            return redirect('category');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            category::destroy($request->id);
            toastr()->success(trans('category.Delete'));

            return redirect('category');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
