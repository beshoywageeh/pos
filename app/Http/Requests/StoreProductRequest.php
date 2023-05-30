<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required | unique:products,name=>ar,'.$this->id,
            'name_en' => 'required | unique:products,name=>en,'.$this->id,
            'category_id' => 'required',
        ];
    }
}
