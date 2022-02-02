<?php

namespace App\Http\Requests\admin\sub_cate;

use Illuminate\Foundation\Http\FormRequest;

class add extends FormRequest
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
            'sub_cate.*.name'   => 'required|string|min:2',
            'main_category'     => 'required|exists:main_categories,id',
            'image'             => 'required|mimes:png,jpg,jpeg',
        ];
    }
}
