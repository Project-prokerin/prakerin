<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\data_prakerin;
use App\Models\perusahaan;
use App\Models\guru;
use App\Http\Requests\admin\data_prakerinRequest;
use App\Models\kelas;

use Illuminate\Support\Facades\Auth;

class data_prakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.data_prakerin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $dataPrakerin = data_prakerin::with('perusahaan')->orderby('created_at','DESC');
            return datatables()->of($dataPrakerin)
            ->editColumn('kelas', function($data){
                //return $data->kelas->level;
                return $data->kelas->level;
            })
            ->editColumn('jurusan', function ($data) {
                if (empty($data->kelas->jurusan->singkatan_jurusan)) {
                    return "Jurusan Belum Terdaftar";
                }
                // return $data->kelas->jurusan->singkatan_jurusan;
                return $data->kelas->jurusan->singkatan_jurusan;
            })
            ->editColumn('tgl_mulai', function ($dataPrakerin) {
                if (empty($dataPrakerin->tgl_mulai)) {
                    return [
                        'display' => '00-00-000',
                        'timestamp' => '00-00-000'
                    ];
                }
                return [
                    'display' => e($dataPrakerin->tgl_mulai->format('m-d-Y')),
                    'timestamp' => $dataPrakerin->tgl_mulai->timestamp
                ];
            })->editColumn('tgl_selesai', function ($dataPrakerin) {
                if (empty($dataPrakerin->tgl_selesai)) {
                    return [
                        'display' => '00-00-000',
                        'timestamp' => '00-00-000'
                    ];
                }
                return [
                    'display' => e($dataPrakerin->tgl_selesai->format('m-d-Y')),
                    'timestamp' => $dataPrakerin->tgl_selesai->timestamp
                ];
            })
                ->addColumn('perusahaan', function (data_prakerin $data_prakerin) {
                if (empty($data_prakerin->perusahaan->nama)) {
                    return "Perusahaan Belum terdaftar";
                }
                    return $data_prakerin->perusahaan->nama;
                })
                ->addColumn('tgl_pelaksanaan', function($data){
                    return $data->created_at->format('m-d-Y');
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/data_prakerin/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    if ( Auth::user()->role != 'pembimbing' && Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu' ) {
                        $button .= '<a  href="../admin/data_prakerin/edit/'.$data->id.'" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah()
    {
        $siswa = Siswa::doesntHave('data_prakerin')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::doesntHave('kelompok_laporan')->get();
        $kelas = kelas::all();
        return view('admin.data_prakerin.tambah', compact('siswa','perusahaan','guru','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(data_prakerinRequest $request)
    {
        // validasi
        $request->validated();
        $siswa = Siswa::where('id', $request->id_siswa)->first();
        $data = data_prakerin::create([
            'nama'   => $siswa->nama_siswa,
            'id_kelas'         => $request->kelas,
            'id_siswa'      => $request->id_siswa,
            'id_perusahaan' => $request->id_perusahaan,
            'id_guru' => $request->id_guru,
            'status' => $request->status,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai
        ]);
        return redirect()->route('data_prakerin.index')->with(['success' => 'Data berhasil di tambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        // dd($id);
        $siswa = Siswa::doesntHave('data_prakerin')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        $dataPrakerin = data_prakerin::findOrFail($id);
        $kelas = kelas::all();
        return view('admin.data_prakerin.detail',compact('dataPrakerin','perusahaan','guru','siswa','id','kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::doesntHave('data_prakerin')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        $dataPrakerin = data_prakerin::findOrFail($id);
        $kelas = kelas::all();
        // dd($dataPrakerin->perusahaan->nama);
        return view('admin.data_prakerin.edit',compact('dataPrakerin','perusahaan','guru','siswa','id','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(data_prakerinRequest $request,data_prakerin $data_prakerin)
    {
        $request->validated();
        $siswa = Siswa::where('id', $request->id_siswa)->first();
        // dd($siswa->nama_siswa);
        $update = data_prakerin::where('id',$data_prakerin->id )->update([
            'nama'   => $siswa->nama_siswa,
            'id_kelas'         => $request->kelas,
            'id_siswa'      => $request->id_siswa,
            'id_perusahaan' => $request->id_perusahaan,
            'id_guru' => $request->id_guru,
            'status' => $request->status,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai
        ]);
            // dd($update);
        return redirect()->route('data_prakerin.index')->with(['success'=>"Data Berhasil di Update"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request, $id)
    {
        data_prakerin::where('id',$id)->delete();
        return response()->json($data = 'berhasil');
    }
}

