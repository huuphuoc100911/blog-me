<?php

namespace Modules\Teacher\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        $id = $this->route()->teacher;

        return [
            'name' => 'required|max: 255',
            'slug' => 'required|min:6|unique:c_teachers,slug,' . $id,
            'description' => 'required',
            'avatar' => $id ? '' : 'required',
            'exp' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'email' => __('validation.email'),
            'unique' => __('validation.unique'),
            'min' => __('validation.min'),
            'max' => __('validation.max'),
            'integer' => __('validation.integer'),
        ];
    }

    public function attributes()
    {
        return __('validation.attributes.teachers');
    }
}
