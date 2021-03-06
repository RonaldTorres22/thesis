<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
        'name' => 'required',
        'email' => 'required',
        'password' => 'min:6|required|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        'password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Password must contain at least one uppercase and numeric character',
        ];
    }
}
