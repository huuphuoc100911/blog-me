<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
        // dd(request()->all());
        return [
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'birth_day' => 'required|date',
            'address' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'address' => 'Địa chỉ',
            'phone_number' => 'Số điện thoại',
            'birth_day' => 'Sinh nhật',
            'province' => 'Tỉnh thành phố',
            'district' => 'Quận huyện',
            'ward' => 'Phường xã',
        ];
    }

    public function messages()
    {
        return [];
    }
}
