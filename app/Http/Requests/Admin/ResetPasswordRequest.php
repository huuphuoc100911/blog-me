<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'warning' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'password',
            'confirm_password' => 'confirm password',
            'warning' => 'warning',
        ];
    }
}
