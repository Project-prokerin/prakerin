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
            "kelas" => "required",
            "jurusan" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required"
        ];
    }
    public function messages()
    {
        return [
            'nama_siswa.required' => 'Nama tidak boleh kosong',
                "kelas.required" => "Kelas anda tidak boleh kosong",
            "jurusan.required" => "Jurusan anda tidak boleh kosong",
            'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',

        ];
    }
}
