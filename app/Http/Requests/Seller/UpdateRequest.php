<?php

namespace App\Http\Requests\Seller;
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
                Rule::unique('sellers', 'document')->ignore($this->route('seller')->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('sellers', 'email')->ignore($this->route('seller')->id)
            ],
            'phone' => 'nullable',
            'city_id' => 'required',
            'address' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the full name.',
            'name.min:5'  => 'The name must be at least 5 characters.',
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

