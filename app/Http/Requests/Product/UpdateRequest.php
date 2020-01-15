<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:2',
                Rule::unique('products', 'name')->ignore($this->route('product')->id)
            ],
            'unit_price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name.',
            'name.min:2'  => 'The name must be at least 2 characters.',
            'unit_price.required' => 'Please enter the unit price the product.',
        ];
    }
}

