<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class disposisiRequest extends FormRequest
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
            'Pokjatujuan' => 'required',
            'Keterangan_disposisi' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'Pokjatujuan.required' => 'Tujuan tidak boleh koosng',
            'Keterangan_disposisi.required' => 'Keterangan tidak boleh kosong'
        ];
    }

}
