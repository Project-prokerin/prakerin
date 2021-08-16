<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class perusahaanRequest extends FormRequest
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
            "nama" => "required",
            "bidang_usaha" => "required",
            "alamat" => "required",
            "link" => "required",
            "email" => "required|email",
            "nama_pemimpin" => "required",
            "deskripsi_perusahaan" => "required",
            "tanggal_mou" => "required|date",
            "status_mou" => "required",
            // "foto" => "required"
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama perusahaan tidak boleh kosong',
            'bidang_usaha.required' => 'Bidang usaha tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'link.required' => 'Link tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus alamat email yang valid',
            "nama_pemimpin.required" => "Nama pemimpin tidak boleh kosong",
            "deskripsi_perusahaan.required" => "Deskripsi tidak boleh kosong",
            "tanggal_mou.required" => "Tanggal mou tidak boleh kosong",
            "tanggal_mou.date" => "Harus berformat tanggal",
            "status_mou.required" => "Status mou tidak boleh kosong",
            // "foto.required" => "Foto tidak boleh kosong",
        ];
    }
}
