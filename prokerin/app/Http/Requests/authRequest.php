<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authRequest extends FormRequest
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
            "username" => "required|min:5",
            "password" => "required|min:5"
        ];
    }

    public function messages()
    {
        return [
            "username.required" => "Username tidak boleh kosong",
            'password.required' => "Password tidak boleh kosong",
            "username.min" => "minimal 5 chharacter",
            "password.min" => "minimal 5 chharacter"
        ];
    }
}
