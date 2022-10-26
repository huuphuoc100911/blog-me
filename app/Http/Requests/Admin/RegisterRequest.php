<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:admins',
            'username' => 'required|max:16',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
        ];
    }
}
