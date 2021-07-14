<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class alumniRequest extends FormRequest
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
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama alumni tidak boleh kosong',
            'kelas.required' => 'kelas tidak boleh kosong',
            'jurusan.required' => 'jurusan tidak boleh kosong',
            'tahun_lulus.required' => 'Tahun sekolah tidak boleh kosong'
        ];
    }

}
