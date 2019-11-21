<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => 'required|min:5',
            'document' => 'required|unique:customers',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')
            ],
            'phone' => 'required|min:7',
            'address' => 'required'
        ];
    }
}
