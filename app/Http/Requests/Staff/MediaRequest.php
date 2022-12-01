<?php

namespace App\Http\Requests\Staff;

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
        $validated = [
            'title' => 'required',
            'description' => 'required',
            'url_image' => 'required',
        ];

        // if ((int)request()->id === 0) {
        //     $validated['url_image'] = 'required';
        // }

        return $validated;
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'url_image' => 'url_image',
            'description' => 'description',
        ];
    }

    public function messages()
    {
        return [
            'url_image.required' => 'Please upload a thumbnail',
        ];
    }
}
