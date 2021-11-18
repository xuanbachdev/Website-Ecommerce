<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'bail|required|max:255',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Username không được để trống',
            'password.required' => 'Password không được để trống'
        ];
    }
}
