<?php

namespace Modules\CCategory\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CCategoryRequest extends FormRequest
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
        $id = $this->route()->manager;

        $rules = [
            'name' => 'required',
            'slug' => 'required|min:6',
            'parent_id' => ['required', 'integer'],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'email' => __('validation.email'),
            'unique' => __('validation.unique'),
            'min' => __('validation.min'),
            'integer' => __('validation.integer'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('validation.attributes.name'),
            'slug' => __('validation.attributes.slug'),
            'parent_id' => __('validation.attributes.parent_id')
        ];
    }
}