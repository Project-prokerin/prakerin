<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Siswa;
class siswaRequest extends FormRequest
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
        $siswa = Siswa::where('id', $this->id)->first();
        // if ($siswa) {
        //     $user = User::select('id')->where('id', $siswa->id_user)->first();
        // }else {
        //     $user = '';
        // }
        return [
            'nama_siswa' => 'required',
            'nipd' => 'required|unique:siswa,nipd,'.$this->id .',id',
            'nisn' => 'required',
            //'jk' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ];
    }
    // untuk validasi massage
    public function messages()
    {
        return [
            'nama_siswa.required' => 'Nama siswa tidak boleh kosong',
            'nipd.required' => 'nipd tidak boleh kosong',
            'nipd.unique' => 'Nipd sudah ada',
            //'jk' => 'jenis kelamin tidak boleh kosong',
            'jurusan.required' => 'Jurusan Tidak boleh kosong',
            'kelas.required' => 'kelas tidak boleh kosong',
            'tempat_lahir.required' => 'Tempat lahir tidak boleh koosng',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'nisn.required' => 'nisn tidak boleh kosong'
        ];
    }
}
