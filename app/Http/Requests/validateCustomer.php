<?php

namespace App\Http\Requests;
use App\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class validateCustomer extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Customer $customer)
    {
        return [
            'name' => 'required|min:5',
            'document' => 'required|unique:customers',
            'email' => Rule::unique('customers', 'email')->ignore($customer->id),
            'phone' => 'required|min:7',
            'address' => 'required'
        ];
    }
}
