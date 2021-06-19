<?php

namespace App\Http\Controllers\admin\jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jurnal_harian;
use App\Models\data_prakerin;
use Carbon\Carbon;
use App\Http\Requests\admin\jurnal_harianRequest;
use Illuminate\Support\Facades\Auth;

class jurnal_harianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebar = 'jurnalH';
        $data_prakerin = data_prakerin::all();
        return view('admin.jurnal_harian.index', compact('sidebar','data_prakerin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $jurnalPrakerin = jurnal_harian::with('siswa')->with('perusahaan');
            return datatables()->of($jurnalPrakerin)
            // ->editColumn('tanggal_pelaksanaan', function ($jurnal_harian) {
            //     return [
            //         'display' => e($jurnal_harian->tanggal_pelaksanaan->format('m-d-Y')),
            //         'timestamp' => $jurnal_harian->tanggal_pelaksanaan->timestamp
            //     ];
            // })

             ->addColumn('id_siswa', function (jurnal_harian $jurnal_harian) {
                 $siswa = empty($jurnal_harian->siswa->kelas->jurusan) ? "Belum mendapat jurusan" : $jurnal_harian->siswa->kelas->jurusan->singkatan_jurusan;
                return $siswa;
            })
            ->addColumn('jurusan', function (jurnal_harian $jurnal_harian) {
                $jurusan = empty($jurnal_harian->siswa->kelas->jurusan) ? "Belum mendapat jurusan" : $jurnal_harian->siswa->kelas->jurusan->singkatan_jurusnx;
                return $jurusan;
            })
            ->addColumn('no_kelompok', function (jurnal_harian $jurnal_harian) {
                $no = empty( $jurnal_harian->siswa->data_prakerin->kelompok_laporan->no) ? "Belum mendapat kelompok" :  $jurnal_harian->siswa->data_prakerin->kelompok_laporan->no;
                return $no;
            })
            ->addColumn('perusahaan', function (jurnal_harian $jurnal_harian) {
                $perusahaan = empty($jurnal_harian->siswa->data_prakerin->kelompok_laporan->nama_perusahaan) ? "Belum mendapat perusahaan" : $jurnal_harian->siswa->data_prakerin->kelompok_laporan->nama_perusahaan;
                return $perusahaan;
            })
            ->addColumn('pembimbing', function (jurnal_harian $jurnal_harian) {
                $pembimbing = empty($jurnal_harian->siswa->data_prakerin->kelompok_laporan->guru->nama) ? "Belum mendapat pembimbing" : $jurnal_harian->siswa->data_prakerin->kelompok_laporan->guru->nama;
                return $pembimbing;
            })
            // ->addColumn('id_perusahaan', function (jurnal_harian $jurnal_harian) {
            //     return $jurnal_harian->perusahaan->nama;
            // })
            // ->editColumn('tgl_selesai', function ($dataPrakerin) {
            //     return [
            //         'display' => e($dataPrakerin->tgl_selesai->format('m-d-Y')),
            //         'timestamp' => $dataPrakerin->tgl_selesai->timestamp
            //     ];
            // })
                ->addColumn('action', function ($data) {
                    $button = '<a href="../admin/jurnalH/detail/'.$data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    if(Auth::user()->role != 'kaprog')
                    {
                    $button .= '&nbsp';
                    $button .= '<button   id="editButton" data-target="#editModal" data-attr="/admin/jurnalH/edit/' . $data->id . '" data-toggle="modal"  class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></button>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }


                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah(Request $request)
    {
        $sidebar = 'jurnalH';
        return view('admin.jurnal_harian.tambah', compact('sidebar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(jurnal_harianRequest $request)
    {
        $validated = $request->validated();

        $prakerin = data_prakerin::where('id',$request->id_siswa)->first();
        $jurnal = jurnal_harian::create([
            'id_siswa' => $prakerin->id_siswa,
            'id_perusahaan' => $prakerin->id_perusahaan,
            'tanggal' => $request->tanggal,
            'datang' => $request->datang,
            'pulang' => $request->pulang,
            'kegiatan_harian' => $request->kegiatan_harian,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);
        return back()->with(['success' => "Jurnal Harian $prakerin->nama Berhasil di tambah"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $sidebar = 'jurnalH';
        return view('admin.jurnal_harian.detail',
         compact('sidebar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
            $data_prakerin = data_prakerin::all();
            $jurnalH = jurnal_harian::find($id);
        return view('admin.jurnal_harian.edit', compact('data_prakerin','jurnalH'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(jurnal_harianRequest $request, $id)
    {
        // dd($request);
        $request->validated();

        $prakerin = data_prakerin::where('id',$request->id_siswa)->first();
        $jurnal = jurnal_harian::find($id)->update([
            'id_siswa' => $prakerin->id_siswa,
            'id_perusahaan' => $prakerin->id_perusahaan,
            'tanggal' => $request->tanggal,
            'datang' => $request->datang,
            'pulang' => $request->pulang,
            'kegiatan_harian' => $request->kegiatan_harian,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);
        return back()->with(['success' => "Jurnal Harian $prakerin->nama Berhasil di Update"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        jurnal_harian::where('id',$id)->delete();
        return response()->json($data = 'berhasil');

    }
    public function delete_all(Request $request)
    {

    }
}
