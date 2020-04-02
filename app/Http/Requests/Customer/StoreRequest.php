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
            'name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'full_name' => 'nullable',
            'document_type' => 'required',
            'document' => [
                'required',
                'numeric',
                Rule::unique('customers', 'document')
                ],
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')
            ],
            'phone' => 'nullable',
            'city_id' => 'required',
            'address' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the name.',
            'name.min:2'  => 'The name must be at least 2 characters.',
            'last_name.required' => 'Please enter the last name.',
            'last_name.min:2'  => 'The last name must be at least 2 characters.',
            'document_type.required' => 'Please enter the identification number.',
            'document.required' => 'Please enter the identification number.',
            'document.numeric'  => 'Enter a valid identification number.',
            'document.unique'  => 'The identification number already exists.',
            'email.required' => 'Please enter the identification number.',
            'email.email'  => 'Enter a valid email with the format "example@mail.com".',
            'email.unique'  => 'The email already exists.',
            'city_id.required' => 'Please select the city name of residence.',
        ];
    }
}

