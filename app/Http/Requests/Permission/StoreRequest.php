<?php

namespace App\Http\Requests\Permission;

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
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                Rule::unique('permissions', 'slug')
            ],
            'description' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name.',
            'name.string'  => 'Enter a valid name.',
            'slug.required' => 'Please enter the slug.',
            'slug.unique' => 'The slug already exists.',
        ];
    }
}

