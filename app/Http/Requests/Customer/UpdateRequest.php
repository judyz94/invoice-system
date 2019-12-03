<?php

namespace App\Http\Requests\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'document' => [
                'required',
                'numeric',
                Rule::unique('customers', 'document')->ignore($this->route('customer')->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($this->route('customer')->id)
            ],
            'phone' => 'nullable',
            'city_id' => 'required',
            'address' => 'nullable'
        ];
    }
}
