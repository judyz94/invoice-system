<?php

namespace App\Http\Requests\InvoiceProduct;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Please select the product name.',
            'price.required'  => 'Please enter the product price.',
            'price.numeric'  => 'Enter a valid price.',
            'quantity.required' => 'Please enter the unit price the product.',
            'quantity.integer' => 'Please enter the unit price the product.',
        ];
    }
}

