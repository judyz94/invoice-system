<?php

namespace App\Http\Requests\Seller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'document' => [
                'required',
                'numeric',
                Rule::unique('sellers', 'document')
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('sellers', 'email')
            ],
            'phone' => 'nullable',
            'city_id' => 'required',
            'address' => 'nullable'
        ];
    }
}
