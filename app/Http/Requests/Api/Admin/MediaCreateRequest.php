<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MediaCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'category' => 'category',
            'description' => 'description',
            'status' => 'status',
        ];
    }
}
