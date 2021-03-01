<?php

namespace App\Http\Requests;

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
        $mulai = siswa('data_prakerin')->tgl_mulai;
        $selesai = siswa('data_prakerin')->tgl_selesai;
        $old = empty(siswa('main')->jurnal_harian->max('tanggal')) ?'' : siswa('main')->jurnal_harian->max('tanggal');
        return [
            'tanggal' => 'required|date|unique:jurnal_harian,tanggal|after_or_equal:'.$mulai.'|before:'.$selesai,
            'datang' => 'required',
            'pulang' => 'required|after:datang',
            'kegiatan_harian' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'datang.required' => 'Jam datang tidak boleh kosong',
            'pulang.required' => 'Jam pulang tidak boleh kosong',
            'kegiatan_harian.required' => 'Kegiatan harian tidak boleh kosong',
            'pulang.after'=> 'Masukan jam pulang yang benar',
            // 'datang.before'=>'Masukan jam datang yang benar '
            "tanggal.unique" => "Masukan Tanggal Pelaksanaan yang benar",
            "tanggal.after_or_equal" => "Tidak boleh melebihi tanggal mulai magang",
            "tanggal.before" => "Tidak boleh melebihi tanggal selesai magang",
        ];
    }
}
