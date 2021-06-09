<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class data_prakerinRequest extends FormRequest
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
            'kelas' => 'required',
            'id_siswa' => 'required',
            'id_perusahaan' => 'required',
            'id_guru' => 'required',
            'status' => 'required',
            'tgl_mulai' => 'required|before:tgl_selesai',
            'tgl_selesai' => 'required|after:tgl_mulai',
        ];
    }
    public function messages()
    {
        return [
            'kelas.required' => 'Kelas tidak boleh kosong',
            'id_siswa.required' => 'Nama siswa tidak boleh kosong',
            'id_perusahaan.required' => 'Nama perusahaan tidak boleh kosong',
            'id_guru.required' => 'Nama guru tidak boleh kosong',
            'tgl_mulai.required' => 'Tanggal mulai tidak boleh kosong',
            'tgl_mulai.required' => 'Tanggal selesai tidak boleh kosong',
            'status.required' => "Status tidak boleh kosong",
            "tgl_mulai.before" => "Masukan tanggal mulai yang benar",
            "tgl_selesai.after" => "Masukan tanggal selesai yang benar",
        ];
    }
}
