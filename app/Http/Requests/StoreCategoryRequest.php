<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required | unique:categories,name->ar,'.$this->id,
            'name_en' => 'required | unique:categories,name->en,'.$this->id,
        ];
    }
}
