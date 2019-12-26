<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'expedition_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:expedition_date',
            'receipt_date' => 'required|date|after_or_equal:expedition_date',
            'seller_id' => 'required|numeric|exists:sellers,id',
            'sale_description' => 'required|min:4',
            'customer_id' => 'required',
            'status' => 'required',
        ];
    }
}

