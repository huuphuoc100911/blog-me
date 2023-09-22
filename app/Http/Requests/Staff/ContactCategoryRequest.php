<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class ContactCategoryRequest extends FormRequest
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
            'title' => 'required',
            'url_image' => 'required',
            'description' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'url_image' => 'image',
            'description' => 'description',
        ];
    }

    public function messages()
    {
        return [
            'url_image.required' => 'Vui lòng chọn hình ảnh',
        ];
    }
}
