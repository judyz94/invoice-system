<?php

namespace App\Http\Requests\InvoiceProduct;
use App\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceProductRequest extends FormRequest
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
            'product_id' => 'required',
            'invoice_id' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ];
    }
}
