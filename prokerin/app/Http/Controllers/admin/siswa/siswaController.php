<?php

namespace App\Http\Controllers\admin\siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\siswaRequest;
use App\Models\kelas;
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
            $siwa = Siswa::orderby('nama_siswa', 'ASC')->get();
            return datatables()->of($siwa)
            ->editColumn('kelas', function ($data) {
                if (empty($data->kelas)) {
                    return "kelas Belum Terdaftar";
                }
                return $data->kelas;
                })
                ->editColumn('jurusan', function ($data) {
                    if (empty($data->jurusan)) {
                        return "Jurusan Belum Terdaftar";
                    }
                    // return $data->kelas->jurusan->singkatan_jurusan;
                    return $data->jurusan;
                })
                ->editColumn('tanggal', function ($data) {
                if (empty($data->tanggal_lahir)) {
                    return "Tanggal lahir kosong";
                }
                    return $data->tanggal_lahir->Isoformat('d MMMM Y');
                })
                ->addColumn('action', function ($data) {
                    $button = '<a  href="/admin/siswa/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','kelas','jurusan'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah(Request $request)
    {
        return view('admin.siswa.tambah',['kelas' => kelas::all()]);
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
        // dd($request->id_siswa);
        $user = User::create(['username' => $request->nipd, 'role' => 'siswa', 'password' => Hash::make('password')]);
        $request->request->add(['id_user' => $user->id]);
        $siswa = Siswa::create(['nama_siswa' => $request->nama_siswa, 'nipd' => $request->nipd,'nisn'=> $request->nisn,  'tempat_lahir' => $request->tempat_lahir, 'tanggal_lahir' => $request->tanggal_lahir,'kelas' => $request->kelas,'jurusan' =>$request->jurusan ,'created_at' => Carbon::now() ,'id_user' => $request->id_user]);
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
        return view('admin.siswa.detail', ['siswa' => Siswa::where('id', $id)->with('orang_tua','sekolah_asal')->first()]);
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

        $kelas = kelas::all();
        return view('admin.siswa.edit', compact('siswa','kelas'));
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
        $siswa = Siswa::where('id', $id)->update(['nama_siswa' => $request->nama_siswa, 'nipd' => $request->nipd,'nisn' => $request->nisn, 'tempat_lahir' => $request->tempat_lahir, 'tanggal_lahir' => $request->tanggal_lahir, 'kelas' => $request->kelas, 'jurusan' => $request->jurusan,  'updated_at' => Carbon::now()]);

        $getSiswa = Siswa::where('id', $id)->first();
        $user = User::where('id', $getSiswa->id_user)->update(['username' => $request->nipd]);

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
        $siswa = Siswa::where('id', $id)->first();
        $siswa->user->delete();
        $siswa->delete();
        return response()->json($data = 'berhasil');
    }
    public function delete_all(Request $request){

    }

    public function template_excel()
    {
        $path = public_path('/file/Excel/Import Template/Template Excel siswa.xlsx');
        $name = basename($path);
        $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path, $name, $headers);
    }
}
