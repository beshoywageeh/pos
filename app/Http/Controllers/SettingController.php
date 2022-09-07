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

//return $data;
        return view('backend.Settings.index', compact('data'));
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
        $getData = setting::get()->first();
        return view('backend.Settings.create',compact('getData'));

    }

    public function update(Request $request, setting $setting)
    {
        try {
            $store = setting::findorfail($request->id);
$oldPhoto = $store->photo;
            if($request->has('photo')){
                $request->validate(['photo'=>'required|mimes:png,jpg,jpeg|max:2000']);
                $photofile = uploadImage('assets/img',$request->photo);
            }else{
                $photofile = $store->photo;
            }
            if(file_exists('assets/img/'.$oldPhoto)){
                unlink('assets/img/'.$oldPhoto);
            }
           // $store = new setting();
            $store->name = $request->name;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->photo = $photofile;

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
