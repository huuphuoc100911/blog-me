<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InfoCompanyRequest extends FormRequest
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
            'url_image' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'link_facebook' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'url_image' => 'url_image',
            'description' => 'description',
            'email' => 'email',
            'phone' => 'phone',
            'link_facebook' => 'link_facebook',
        ];
    }

    public function messages()
    {
        return [
            'url_image.required' => 'Please upload a thumbnail',
        ];
    }
}
