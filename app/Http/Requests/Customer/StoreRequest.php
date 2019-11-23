<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'document' => 'required|unique:customers',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')
            ],
        ];
    }
}
