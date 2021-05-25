<?php

namespace App\Http\Requests\user;

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
            "no_hp" => "required|min:8",
            "kelas" => "required"
        ];
    }
    public function messages()
    {
        return [
            'nama_siswa.required' => 'Nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'no_hp.required' => 'no_hp tidak boleh kosong',
            'no_hp.min' => 'minimal 8 character',
            'email.email' => 'Email harus alamat email yang valid',
            "kelas.required" => "Kelas anda tidak boleh kosong"
        ];
    }
}
