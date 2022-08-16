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

        return view('backend.Settings.index', compact('data', 'countries'));
    }

    public function create()
    {
        return view('backend.Settings.create');
    }

    public function store(Request $request)
    {
        DB::table('settings')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back();
    }

    public function show(setting $setting)
    {
    }

    public function edit(setting $setting)
    {
    }

    public function update(Request $request, setting $setting)
    {
    }

    public function destroy(setting $setting)
    {
    }
}
