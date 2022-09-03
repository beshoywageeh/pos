<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $data = setting::get()->first();
        $countries = country::get();
//return $data;
        return view('backend.Settings.index', compact('data', 'countries'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        

    }

    public function show(setting $setting)
    {
    }

    public function edit(setting $setting)
    {
        return view('backend.Settings.create');

    }

    public function update(Request $request, setting $setting)
    {
        try {
            $store = setting::findorfail($request->id);
           // $store = new setting();
            $store->name = $request->name;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->save();
            toastr()->success('تم اضافة المتجر بنجاح');

            return redirect('settings');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(setting $setting)
    {
    }
}
