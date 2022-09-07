<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salesinvrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client' => 'required',
            'products_list'=>'required'
        ];
    }
    public function messages(){
        return[
            'client.required' =>'اسم العميل مطلوب',
            'products_list.required' =>'يجب ادخال منتج واحد علي الاقل',
        ];
    }
}
