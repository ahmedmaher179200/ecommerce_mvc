<?php

namespace App\Http\Requests\vendor;

use Illuminate\Foundation\Http\FormRequest;

class addProduct extends FormRequest
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
            'name'                  => 'required|string',
            'describe'              => 'required|string',
            'price'                 => 'required|integer',
            'sub_CategoriesId'      => 'required|exists:sub_categories,id',
            'images'                => 'required_without:noImage',
            'images.*'              => 'mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'field required',
            'integer'               => 'this field integer',
            'exists'                => 'the sub Categores not exists',
        ];
    }
}
