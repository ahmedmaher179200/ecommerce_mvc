<?php

namespace App\Http\Requests\admin\main_cate;

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
            'main_cate.*.name' => 'required|string|min:2',
            'image'            => 'required|mimes:png,jpg,jpeg',
        ];
    }
}
