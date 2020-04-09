<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'document' => [
                'required',
                'string',
                Rule::unique('users', 'document')->ignore($this->route('user')->id)
            ],
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($this->route('user')->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the user name.',
            'name.string' => 'Enter a valid name.',
            'name.max:255'  => 'The name must have a maximum of 255 characters.',
            'document.required' => 'Please enter the document number.',
            'document.string' => 'Enter a valid document number.',
            'document.unique'  => 'The document number already exists.',
            'email.required' => 'Please enter the identification number.',
            'email.string'  => 'Enter a valid e-mail address.',
            'email.email'  => 'Enter a valid e-mail with the format "example@mail.com".',
            'email.max:255'  => 'The e-mail address must have a maximum of 255 characters.',
            'email.unique'  => 'The e-mail already exists.'
        ];
    }
}

