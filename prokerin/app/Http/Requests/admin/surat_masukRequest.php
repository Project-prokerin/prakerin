<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class surat_masukRequest extends FormRequest
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
              'nama_surat' => 'required',
            'id_untuk' => 'required',
            'surat' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'nama_surat.required' => "Nama surat tidak boleh kosong",
            'id_untuk.required' => 'Tujuan tidak boleh kosong',
            'surat.required' => "File tidak boleh kosong"
        ];
    }
}
