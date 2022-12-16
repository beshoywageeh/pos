<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\category;
use App\Models\product;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(CategoriesDataTable $dataTable)
    {
      return $dataTable->render('backend.Categories.index');
    }

    public function create()
    {
    }

    public function store(StoreCategoryRequest $request, ToastrFactory $flasher)
    {
        try {
            category::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => $request->notes,
            ]);
          //  $flasher->titel('تم بنجاح')->success(trans('general.add_msg'))->timeOut(3000)->flash();
            $flasher->AddSuccess(trans('general.add_msg'));
            return redirect()->back();
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

    public function update(StoreCategoryRequest $request, ToastrFactory $flasher)
    {
        $cat = category::findorfail($request->id);
        try {
            $cat->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => $request->notes,
            ]);
            $flasher->Addinfo(trans('general.update_msg'));

            return redirect('category');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, ToastrFactory $flasher)
    {
        try {
            category::destroy($request->id);
            $flasher->AddError(trans('general.delete_msg'));
            return redirect('category');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
