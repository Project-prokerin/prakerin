<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kelompok_laporanRequest extends FormRequest
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
            'no' => 'required',
            'id_guru' => 'required',
            'id_data_prakerin[]' => 'required',
            'id_perusahaan' => 'required',
            'no_telpon' => 'required',
            'jurusan' => 'required',
        ];
    }
    public function messages()
        {
        return [
            'no.required' => 'No idak boleh kosong',
            'id_guru.required' => 'Guru tidak boleh kosong',
            'id_data_prakerin[].required' => 'data prakerin tidak boleh kosong',
            'id_perusahaan.required' => 'Nama perusahaan tidak boleh kosong',
            'no_telpon.required' => 'No telpon tidak boleh kosong',
            'jurusan.required' => 'Jurusan tidak boleh kosong',
 
        ];
    }
}

