<?php

namespace App\Http\Controllers\admin\siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\siswaRequest;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\orang_tua;
use App\Models\pembekalan_magang;
use App\Models\sekolah_asal;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
{
    private $siswa;
    private $orang_tua;
    private $pembekalan_magang;
    private $sekolah_asal;

    // public function __construct()
    // {
    //     $this->siswa = Siswa::all();
    //     $this->orang_tua = orang_tua::all();
    //     $this->pembekalan_magang = pembekalan_magang::all();
    //     $this->sekolah_asal = sekolah_asal::all();
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.siswa.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request )
    {
        if ($request->ajax()) {
            $siwa = Siswa::all();
            return datatables()->of($siwa)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/siswa/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/siswa/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah(Request $request)
    {
        return view('admin.siswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(siswaRequest $request)
    {
        $validate = $request->validated();
        $siswa = Siswa::create(['nama_siswa' => $request->nama_siswa, 'nipd' => $request->nipd, 'jk' => $request->jk, 'tempat_lahir' => $request->tempat_lahir, 'tanggal_lahir' => $request->tanggal_lahir, 'nik' => $request->nik, 'agama' => $request->agama, 'alamat' => $request->alamat, 'jenis_tinggal' => $request->jenis_tinggal, 'transportasi' => $request->transportasi, 'no_hp' => $request->no_hp, 'email' => $request->email, 'bb' => $request->bb, 'tb' => $request->tb, 'anak_ke' => $request->anak_ke, 'jmlh_saudara' => $request->jmlh_saudara, 'kebutuhan_khusus' => $request->kebutuhan_khusus, 'no_akte' => $request->no_akte,'kelas' => $request->kelas,'Jurusan' => $request->jurusan, 'created_at' => Carbon::now()]);

        $request->request->add(['id_siswa' => $siswa->id]);
        // dd($request->id_siswa);
        $user = User::create(['username' => $request->nipd, 'id_siswa' => $request->id_siswa, 'role' => 'siswa', 'password' => Hash::make('password')]);

        $orangtua = orang_tua::create(['id_siswa' => $request->id_siswa, 'nomor_kk' => $request->nomor_kk, 'nama_ayah' => $request->nama_ayah, 'tl_ayah' => $request->tl_ayah, 'pendidikan_ayah' => $request->pendidikan_ayah, 'pekerjaan_ayah' => $request->pekerjaan_ayah, 'penghasilan_ayah' => $request->penghasilan_ayah, 'nik_ayah' => $request->nik_ayah, 'nama_ibu' => $request->nama_ibu, 'tl_ibu' => $request->tl_ibu, 'pendidikan_ibu' => $request->pendidikan_ibu, 'pekerjaan_ibu' => $request->pendidkan_ibu, 'pekerjaan_ibu' => $request->pekerjaan_ibu, 'penghasilan_ibu' => $request->penghasilan_ibu, 'nik_ibu' => $request->nik_ibu, 'status' => $request->status, 'created_at' => Carbon::now()]);

        $sekolah_asal = sekolah_asal::create(['id_siswa' => $request->id_siswa, 'asal_sekolah' => $request->asal_sekolah, 'no_ijazah' => $request->no_ijazah, 'shkun' => $request->shkun, 'created_at' => Carbon::now()]);
        return redirect()->route('siswa.index')->with('success', 'Data berhasil di tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return view('admin.siswa.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $orangtua = orang_tua::where('id_siswa', $id)->first();
        $sekolah = sekolah_asal::where('id_siswa', $siswa->id)->first();
        return view('admin.siswa.edit', compact('siswa', 'orangtua', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(siswaRequest $request, $id)
    {
        $validated = $request->validated();
        $siswa = Siswa::where('id', $id)->update(['nama_siswa' => $request->nama_siswa, 'nipd' => $request->nipd, 'jk' => $request->jk, 'tempat_lahir' => $request->tempat_lahir, 'tanggal_lahir' => $request->tanggal_lahir, 'nik' => $request->nik, 'agama' => $request->agama, 'alamat' => $request->alamat, 'jenis_tinggal' => $request->jenis_tinggal, 'transportasi' => $request->transportasi, 'no_hp' => $request->no_hp, 'email' => $request->email, 'bb' => $request->bb, 'tb' => $request->tb, 'anak_ke' => $request->anak_ke, 'jmlh_saudara' => $request->jmlh_saudara, 'kebutuhan_khusus' => $request->kebutuhan_khusus, 'no_akte' => $request->no_akte, 'kelas' => $request->kelas, 'Jurusan' => $request->jurusan,  'updated_at' => Carbon::now()]);

        $orangtua =  orang_tua::where('id_siswa', $id)->update(['nomor_kk' => $request->nomor_kk, 'nama_ayah' => $request->nama_ayah, 'tl_ayah' => $request->tl_ayah, 'pendidikan_ayah' => $request->pendidikan_ayah, 'pekerjaan_ayah' => $request->pekerjaan_ayah, 'penghasilan_ayah' => $request->penghasilan_ayah, 'nik_ayah' => $request->nik_ayah, 'nama_ibu' => $request->nama_ibu, 'tl_ibu' => $request->tl_ibu, 'pendidikan_ibu' => $request->pendidikan_ibu, 'pekerjaan_ibu' => $request->pendidkan_ibu, 'pekerjaan_ibu' => $request->pekerjaan_ibu, 'penghasilan_ibu' => $request->penghasilan_ibu, 'nik_ibu' => $request->nik_ibu, 'status' => $request->status, 'updated_at' => Carbon::now()]);

        $sekolah =  sekolah_asal::where('id_siswa', $id)->update(['asal_sekolah' => $request->asal_sekolah, 'no_ijazah' => $request->no_ijazah, 'shkun' => $request->shkun, 'created_at' => Carbon::now()]);

        $user = User::where('id_siswa', $id)->update(['username' => $request->nipd]);

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $delete = Siswa::where('id', $id)->delete();
        return response()->json($siswa = 'berhasil');
    }
    public function delete_all(Request $request){

    }
}
