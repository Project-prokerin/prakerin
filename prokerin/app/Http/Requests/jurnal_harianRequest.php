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
        return [
            'tanggal' => 'required|date',
            'datang' => 'required',
            'pulang' => 'required',
            'kegiatan_harian' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'datang.required' => 'Jam datang tidak boleh kosong',
            'pulang.required' => 'Jam pulang tidak boleh kosong',
            'kegiatan_harian.required' => 'Kegiatan harian tidak boleh kosong'
        ];
    }
}
