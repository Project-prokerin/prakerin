<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
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
        $user = User::where('id_siswa', $this->id)->first();
        return [
            'nama_siswa' => 'required',
            'nipd' => 'required|unique:users,username,'. $user->id,
            'jk' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_tinggal' => 'required',
            'transportasi' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'bb' => 'required|numeric',
            'tb' => 'required|numeric',
            'anak_ke' => 'required',
            'jmlh_saudara' => 'required',
            'kebutuhan_khusus' => 'required',
            'no_akte' => 'required',
            'nomor_kk' => 'required',
            'nama_ayah' => 'required',
            'tl_ayah' => 'required|date',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nik_ayah' => 'required',
            'nama_ibu' => 'required',
            'tl_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'nik_ibu' => 'required',
            'asal_sekolah' => 'required',
            'no_ijazah' => 'required',
            'shkun' => 'required',
        ];
    }
    // untuk validasi massage
    public function messages()
    {
        return [
            'nama_siswa.required' => 'Nama siswa tidak boleh kosong',
            'nipd.required' => 'nipd tidak boleh kosong',
            'nipd.unique' => 'Nipd sudah ada',
            'kelas.required' => 'kelas tidak boleh kosong',
            'jurusan.required' => 'Jurusan Tidak boleh kosong',
            'tempat_lahir.required'=> 'Tempat lahir tidak boleh koosng',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'nik.required' => 'Nik tidak boleh kosong',
            'agama.required' => 'Agama tidak boleh kosong',
            "alamat.required" => 'Alamat tidak boleh kosong',
            'jenis_tinggal.required' => 'Jenis Tinggal tidak boleh kosong',
            'transportasi.requird' => 'transportasi tidak boleh kosong',
            'no_hp.required' => 'Nomor hp tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email'=> 'Hrus berformat email',
            'bb.required' => 'Berat badan tidak boleh kosong',
            'bb.numeric' => 'Masukan berat badang yang benar',
            'tb.required' => 'Tinggi badan tidak boleh kosong',
            'tb.numeric' => 'Masukan Tinggi badang yang benar',
            'anak_ke.required' => 'Anak ke tidak boleh kosong',
            'jmlh_saudara.required' => 'Jumlah Saudara  tidak boleh kosong',
            'no_akte.required' => 'nomor akte tidak boleh kosong',
            'kebutuhan_khusus.required' => 'Kebutuhan khusus  tidak boleh kosong',
            'nomor_kk.required' => 'Nomor kk tidak boleh kosong',
            'nama_ayah.required' => 'Nama ayah tidak boleh kosong',
            'tl_ayah.required' => 'Tangal lahir tidak boleh kosong',
            'pendidikan_ayah.required' => 'Pendidikan Ayah tidak boleh kosong',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah tidak boleh kosong',
            'penghasilan_ayah.required' => 'Penghasilan ayah tidak boleh kosong',
            'nik_ayah.required' => 'Nik ayah tidak boleh kosong',
            'nama_ibu.required' => 'Nama ibu tidak boleh kosong',
            'tl_ibu.required' => 'Tangal lahir tidak boleh kosong',
            'pendidikan_ibu.required' => 'Pendidikan Ibu tidak boleh kosong',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu tidak boleh kosong',
            'penghasilan_ibu.required' => 'Penghasilan Ibu tidak boleh kosong',
            'asal_sekolah.required' => 'Asal sekolah tidak boleh kosong',
            'no_ijazah.required' => 'Nomor ijazah tidak boleh kosong',
            'shkun.required' => 'Tidak boleh kosong'







        ];
    }
}
