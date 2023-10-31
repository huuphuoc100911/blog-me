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
            'category_id' => 'required',
            'description' => 'required',
            'is_active' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'category_id' => 'category_id',
            'description' => 'description',
            'is_active' => 'status',
        ];
    }
}
