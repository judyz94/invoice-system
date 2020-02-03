<?php

namespace App\Http\Requests\InvoiceProduct;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'price.required'  => 'Please enter the product price.',
            'price.numeric'  => 'Enter a valid price.',
            'quantity.required' => 'Please enter the unit price the product.',
            'quantity.integer' => 'Please enter the unit price the product.',
        ];
    }
}

