<?php

namespace App\Http\Traits;

use App\Models\setting;

trait SettingTrait
{
    public function GetData()
    {
        $setting = setting::all();
        $data['data'] = $setting->flatMap(function ($setting) {
            return [$setting->key => $setting->value];
        });

        return $data;
    }
}
