<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class pembekalan_magangRequest extends FormRequest
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
            'siswa' => 'required',
            'file' => 'required|file|mimes:pdf',
            'test_wpt_iq' => 'required',
            'personality_interview' => 'required',
            'soft_skill' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'file.required' => 'File tidak boleh kosong',
            'siswa.required' => 'Nama siswa tidak boleh kosong',
            'file.file' => 'Harus berformat file',
            'file.mimes' => 'Harus berformat pdf',
            'test_wpt_iq.required' =>  'tidak boleh kosong',
            'personality_interview.required' => 'tidak boleh kosong',
            'soft_skill.required' => 'tidak boleh kosong',
        ];
    }
}
