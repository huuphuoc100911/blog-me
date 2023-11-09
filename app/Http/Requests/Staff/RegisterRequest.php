<?php

namespace App\Http\Requests\Staff;

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
            'name' => 'required',
            'email' => 'required|email|unique:staffs|unique:admins',
            'password' => 'required|min:6',
            'password-confirm' => 'required|same:password',
            'agree' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'username',
            'email' => 'email',
            'password' => 'password',
            'password-confirm' => 'confirm password',
            'agree' => 'agree',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
