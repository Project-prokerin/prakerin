<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileRequest extends FormRequest
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
            "nama_siswa" => "required",
            "email" => "required|email",
            "no_hp" => "required|min:8"
        ];
    }
    public function messages()
    {
        return [
            'nama_siswa.required' => 'nama_siswa tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'no_hp.required' => 'no_hp tidak boleh kosong',
            'no_hp.min' => 'minimal 8 character',
            'email.email' => 'harus format email'
        ];
    }
}
