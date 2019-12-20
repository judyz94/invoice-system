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
            'product_price' => 'required',
            'product_quantity' => 'required|integer'
        ];
    }
}
