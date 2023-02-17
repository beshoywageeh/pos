<?php

namespace App\Http\Controllers;

use App\Http\Traits\SettingTrait;
use App\Models\setting;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use SettingTrait;

    public function index()
    {
        return view('backend.Settings.index', $this->GetData());
    }

    public function edit(setting $setting)
    {
        return view('backend.Settings.create', $this->GetData());
    }

    public function update(Request $request, ToastrFactory $flasher)
    {
        try {
            $info = $request->except('_token', 'photo');
            foreach ($info as $key => $value) {
                setting::where('key', $key)->update(['value' => $value]);
            }
            if ($request->has('photo')) {
                $request->validate(['photo' => 'required|mimes:png,jpg,jpeg|max:2000']);
                $photofile = uploadImage('assets/img', $request->photo);
                setting::where('key', 'photo')->update(['value' => $photofile]);
            }
            $oldPhoto = setting::where('key', 'photo')->get('value')->first();
            if (file_exists('assets/img/'.$oldPhoto)) {
                unlink('assets/img/'.$oldPhoto);
            }

            $flasher->AddInfo(trans('general.edit_msg'));

            return redirect('settings');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
