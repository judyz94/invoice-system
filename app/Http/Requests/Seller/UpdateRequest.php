<?php

namespace App\Http\Requests\Seller;
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
            'name' => 'required|min:5',
            'document' => [
                'required',
                'numeric',
                Rule::unique('sellers', 'document')->ignore($this->route('seller')->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('sellers', 'email')->ignore($this->route('seller')->id)
            ],
            'phone' => 'nullable',
            'city_id' => 'required',
            'address' => 'nullable'
        ];
    }
}
