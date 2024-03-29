<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\category;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = category::all();

        return view('backend.Categories.index', ['data' => $data]);
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

    public function show($category)
    {
        $data['category'] = category::where('id', $category)->with('products')->first();

        return view('backend.Categories.show', ['data' => $data]);
    }

    public function update(StoreCategoryRequest $request, ToastrFactory $flasher)
    {
        try {
            $cat = category::findorfail($request->id);
            $cat->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => $request->notes,
            ]);
            $flasher->Addinfo(trans('general.edit_msg'));

            return redirect()->route('category_index');
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
            $flasher->Addinfo(trans('general.delete_msg'));

            return redirect()->route('category_index');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
