<?php

namespace App\Http\Requests\Admin;

use App\Rules\Staff\Uppercase;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'title' => ['required', $this->_method === 'PATCH' ? new Uppercase(request()->media_id) : new Uppercase('')],
            'url_image' => $this->_method === 'PATCH' ? '' : 'required',
            'description' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'url_image' => 'Hình ảnh',
            'description' => 'Mô tả',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'url_image.required' => 'Vui lòng upload hình ảnh',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }
}
