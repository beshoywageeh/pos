<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required '.$this->id,
            'name_en' => 'required '.$this->id,
            'code' => 'required | unique:clients,code'.$this->id,
            'address' => 'required'.$this->id,
        ];
    }

    public function messages(): array
    {
        return [
            'code.unique' => 'يوجد عميل مسجل بهذا الكود بالفعل',
        ];
    }
}
