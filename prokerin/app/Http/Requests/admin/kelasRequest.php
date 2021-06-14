<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class kelasRequest extends FormRequest
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
            'id_jurusan' => 'required',
            'level' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id_jurusan.required' => 'Jurusan tidak boleh kosong',
            'level.unique' => 'Kelas Sudah ada!',
            'level.required' => 'Kelas tidak boleh kosong!',
        ];
    }
}
