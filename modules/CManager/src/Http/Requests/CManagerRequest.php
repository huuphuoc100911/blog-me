<?php

namespace Modules\CManager\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CManagerRequest extends FormRequest
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
            'email' => 'required|email|unique:c_managers,email',
            'password' => 'required|min:6',
            'group_id' => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value == 0) {
                    $fail(__('CManager::validation.select'));
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'required' => __('CManager::validation.required'),
            'email' => __('CManager::validation.email'),
            'unique' => __('CManager::validation.unique'),
            'min' => __('CManager::validation.min'),
            'integer' => __('CManager::validation.integer'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('CManager::validation.attributes.name'),
            'email' => __('CManager::validation.attributes.email'),
            'password' => __('CManager::validation.attributes.password'),
            'group_id' => __('CManager::validation.attributes.group_id')
        ];
    }
}
