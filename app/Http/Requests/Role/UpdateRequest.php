<?php

namespace App\Http\Requests\Role;

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
            'name' => [
                'required',
                'string',
                Rule::unique('roles', 'name')->ignore($this->route('role')->id)
            ],
            'slug' => [
                'required',
                Rule::unique('roles', 'slug')->ignore($this->route('role')->id)
            ],
            'description' => 'nullable',
            'special' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name.',
            'name.string'  => 'Enter a valid name.',
            'name.unique' => 'The name already exists.',
            'slug.required' => 'Please enter the slug.',
            'slug.unique' => 'The slug already exists.',
        ];
    }
}

