<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\guru;
class guruRequest extends FormRequest
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
            'nik' => 'required|unique:guru,nik,' . $this->id,
            'nama' => 'required',
            'jabatan' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = User::where('role', $value)->where('id_guru', '!=', $this->id)->count();
                    if ($value === 'hubin' || $value === 'bkk' || $value == 'kaprog') {
                        if ($value === 'kaprog') {
                            if ($user >= 6) {
                                $fail("Jabatan $value sudah penuh");
                            }
                        } else if ($value === 'hubin' or $value === 'bkk') {
                            if ($user >= 1) {
                                $fail("Jabatan $value sudah penuh");
                            }
                        }
                    }
                }
            ],
            'jurusan' => [
                'required',
                function ($attribute, $value, $fail) {
                    $jurusan = guru::where('jurusan', $value)->where('id', '!=', $this->id)->count();
                    if ($jurusan >= 5) {
                        $fail("Jurusan $value sudah penuh");
                    }
                }
            ],
            'no_telp' => 'required'
        ];
    }
    // untuk validasi massage
    public function messages()
    {
        return [
            'nik.required' =>  'nik tidak boleh kosong',
            'nama.required' => 'nama tidak boleh kosong',
            'jabatan.required' => 'jabatan tidak boleh kosong',
            'jurusan.required' => 'jurusan tidak boleh kosong',
            'no_telp.required' => 'Nomor telepone tidak boleh kosong',
        ];
    }
}
