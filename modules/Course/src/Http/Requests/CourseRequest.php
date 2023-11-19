<?php

namespace Modules\Course\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        $id = $this->route()->course;

        $rules = [
            'name' => 'required',
            'slug' => 'required|min:6|unique:c_courses,slug,' . $id,
            'description' => 'required',
            'teacher_id' => ['required', 'integer', function ($attributes, $value, $fail) {
                if ($value == 0) {
                    $fail(__('validation.select'));
                }
            }],
            'price' => 'required',
            'sale_price' => 'required',
            'thumbnail' => $id ? '' : 'required',
            'code' => 'required|max:255|unique:c_courses,code,' . $id,
            'supports' => 'required',
            'categories' =>  'required',
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
            'max' => __('validation.max'),
            'integer' => __('validation.integer'),
        ];
    }

    public function attributes()
    {
        return __('validation.attributes.courses');
    }
}
