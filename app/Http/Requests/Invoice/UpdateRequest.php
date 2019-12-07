<?php

namespace App\Http\Requests\Invoice;
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
            'code' => [
                'required',
                Rule::unique('invoices', 'code')->ignore($this->route('invoice')->id)
            ],
            'expedition_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:expedition_date',
            'receipt_date' => 'required|date|after_or_equal:expedition_date',
            'seller_id' => 'required',
            'sale_description' => 'required|min:4',
            'vat' => 'required|numeric|between:0,99.99',
            'customer_id' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ];
    }
}