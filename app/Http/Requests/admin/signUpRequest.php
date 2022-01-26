<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class signUpRequest extends FormRequest
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
            'username'                  => 'required|string|unique:admins,username,' . $this->id,
            'email'                     => 'required|string|email|unique:admins,email,' . $this->id,
            'password'                  => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'this field required',
            'unique'                => 'this field is exist',
        ];
    }
}
