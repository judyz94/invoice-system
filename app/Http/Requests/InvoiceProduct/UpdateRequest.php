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
            'invoice_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ];
    }
}
