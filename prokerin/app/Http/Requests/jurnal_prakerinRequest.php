<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class jurnal_prakerinRequest extends FormRequest
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
            'kompetisi_dasar' => 'required',
            'topik_pekerjaan' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'jam_masuk' => 'required',
            'jam_istiharat' => 'required',
            'jam_pulang' => 'required',
            'mess' => 'required',
            'makan_siang' => 'required',
            'bus_antar_jemput' => 'required',
            'intensif' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'kompetisi_dasar.required' => 'kompetisi dasar tidak boleh kosong',
            'topik_pekerjaan.required' => 'topik pekerjaan tidak boleh kosong',
            'tanggal_pelaksanaan.required' => 'tanggal pelaksanaan tidak boleh kosong',
            'jam_masuk.required' => 'jam_masuk tidak boleh kosong',
            'jam_istiharat.required' => 'jam_istiharat tidak boleh kosong',
            'jam_pulang.required' => 'am_pulang tidak boleh kosong',
            'mess.required' => 'Mess tidak boleh kosong',
            'makan_siang.required' => 'makan_siang tidak boleh kosong',
            'Bus antar jemput.required' => 'bus_antar_jemput tidak boleh kosong',
            'intensif.required' => 'intensif tidak boleh kosong',
        ];
    }
}
