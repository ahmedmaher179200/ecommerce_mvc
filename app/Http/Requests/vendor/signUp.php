<?php

namespace App\Http\Requests\vendor;

use Illuminate\Foundation\Http\FormRequest;

class signUp extends FormRequest
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
            'username'                  => 'required|string|unique:vendors,fullName,' . $this->id,
            'email'                     => 'required|string|email|unique:vendors,email,' . $this->id,
            'phone'                     => 'required|string',
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
