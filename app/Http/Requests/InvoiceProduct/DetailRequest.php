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
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Please select the product name.',
            'product_price.required'  => 'Please enter the product price.',
            'product_price.numeric'  => 'Enter a valid price.',
            'product_quantity.required' => 'Please enter the unit price the product.',
            'product_quantity.integer' => 'Please enter the unit price the product.',
        ];
    }
}

