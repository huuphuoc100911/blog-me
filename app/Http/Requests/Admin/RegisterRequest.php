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
            'email' => 'required|email|max:255|unique:admins|unique:staffs|unique:users',
            'username' => 'required|max:255',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'terms' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'email',
            'username' => 'username',
            'password' => 'password',
            'confirm_password' => 'confirm password',
            'terms' => 'terms',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
