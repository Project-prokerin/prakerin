<?php


namespace App\Http\Requests\user;



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

        $mulai = siswa('data_prakerin')->tgl_mulai;

        $selesai = siswa('data_prakerin')->tgl_selesai;

        return [

            'kompetisi_dasar' => 'required',

            'topik_pekerjaan' => 'required',

            'hari_pelaksanaan' => 'required', //|after_or_equal:' . $mulai . '|before:' . $selesai, , <- untuk validasi sesudah mulah dan sebelum selesai

            'jam_masuk' => 'required',

            // 'jam_istiharat' => 'required|after:jam_masuk|between:10,12',

            'jam_istiharat' => 'required|after:jam_masuk',

            'jam_pulang' => 'required|after:jam_istiharat|after:jam_masuk',

            'mess' => 'required',

            'makan_siang' => 'required',

                            'bus_antar_jemput' => 'required',

            'intensif' => 'required'

        ];

    }

    public function messages()

    {

        return [

            'kompetisi_dasar.required' => 'Kompetisi dasar tidak boleh kosong',

            'topik_pekerjaan.required' => 'Topik pekerjaan tidak boleh kosong',

            'hari_pelaksanaan.required' => 'Hari pelaksanaan tidak boleh kosong',

            'jam_masuk.required' => 'Jam masuk tidak boleh kosong',

            'jam_istiharat.required' => 'Jam istiharat tidak boleh kosong',

            'jam_pulang.required' => 'Jam pulang tidak boleh kosong',

            'mess.required' => 'Mess tidak boleh kosong',

            'makan_siang.required' => 'Makan siang tidak boleh kosong',

                            'bus_antar_jemput.required' => 'Bus antar jemput tidak boleh kosong',

            'intensif.required' => 'intensif tidak boleh kosong',

            'jam_istiharat.after' => 'Masukan Jam istirahat yang benar',

            'jam_pulang.after' => 'Masukan jam pulang yang benar',

            "tanggal_pelaksanaan.unique" => "Masukan Tanggal Pelaksanaan yang benar",

            "tanggal_pelaksanaan.after_or_equal" => "Tidak boleh melebihi tanggal mulai magang",

            "tanggal_pelaksanaan.before" => "Tidak boleh melebihi tanggal selesai magang",

        ];

    }

}

