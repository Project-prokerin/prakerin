<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'old_pass' => 'required',
            'new_pass' => 'required',
            'new_pass2' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'old_pass.required' => 'Password lama tidak boleh kosong',
            'new_pass.required' => 'Password baru tidak boleh kosong',
            'new_pass2.required' => 'Harap ulangi password baru anda',
        ];
    }
}
