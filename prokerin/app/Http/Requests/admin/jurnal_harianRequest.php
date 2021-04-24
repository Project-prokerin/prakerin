<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class jurnal_harianRequest extends FormRequest
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
            'id_siswa' => 'required',
            'tanggal' => 'required|date',
            'datang' => 'required',
            'pulang' => 'required|after:datang',
            'kegiatan_harian' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_siswa.required'=> 'Siswa Prakerin Tidak Boleh Kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'datang.required' => 'Jam datang tidak boleh kosong',
            'pulang.required' => 'Jam pulang tidak boleh kosong',
            'kegiatan_harian.required' => 'Kegiatan harian tidak boleh kosong',
            'pulang.after' => 'Masukan jam pulang yang benar',
            // 'datang.before'=>'Masukan jam datang yang benar '
            "tanggal.unique" => "Tanggal Pelaksanaan sudah ada",
            "tanggal.after_or_equal" => "Tidak boleh melebihi tanggal mulai magang",
            "tanggal.before" => "Tidak boleh melebihi tanggal selesai magang",
        ];
    }




}
