<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class jurusanRequest extends FormRequest
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
            "jurusan" => 'required',
            'singkatan_jurusan' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'jurusan.required' => 'Jurusan tidak boleh kosong',
            'singkatan_jurusan.required' => 'Singkatan jurusan tidak boleh kosong '
        ];
    }

}
