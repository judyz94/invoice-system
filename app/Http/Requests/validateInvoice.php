<?php

namespace App\Http\Requests;
use App\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class validateInvoice extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'expedition_date' => 'required',
            'due_date' => 'required|date|after_or_equal:expedition_date',
            'receipt_date' => 'required|date|after_or_equal:expedition_date',
            'sale_description' => 'required|min:4',
            'status' => 'required'
        ];
    }
}
