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
            'receipt_date' => 'nullable|date|after_or_equal:expedition_date',
            'seller_id' => 'required|numeric|exists:sellers,id',
            'sale_description' => 'required|min:4',
            'customer_id' => 'required',
            'state_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'expedition_date.required' => 'Please enter the expedition date.',
            'expedition_date.date'  => 'Enter a valid date.',

            'due_date.required' => 'Please enter the due date.',
            'due_date.date'  => 'Enter a valid date.',
            'due_date.after_or_equal:expedition_date'  => 'The due date must be after or equal to the expedition date.',

            'receipt_date.date'  => 'Enter a valid date.',
            'receipt_date.after_or_equal:expedition_date'  => 'The receipt date must be after or equal to the expedition date.',

            'seller_id.required' => 'Please select a seller name.',
            'seller_id.numeric' => 'Enter a valid seller.',

            'sale_description.required' => 'Please  enter the sale description.',
            'sale_description.min:4' => 'The sale description must be at least 4 characters.',

            'customer_id.required' =>  'Please select a customer name.',

            'state_id.required' =>  'Please enter the invoice status.',
        ];
    }
}

