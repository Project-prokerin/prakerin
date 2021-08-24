<?php

namespace App\Http\Controllers\admin\jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jurnal_harian;
use App\Models\data_prakerin;
use Carbon\Carbon;
use App\Http\Requests\admin\jurnal_harianRequest;
use App\Models\jurnal_prakerin;
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
            $jurnalPrakerin = jurnal_harian::with('siswa')->with('perusahaan')->orderby('created_at', 'DESC');
            return datatables()->of($jurnalPrakerin)
            // ->editColumn('tanggal_pelaksanaan', function ($jurnal_harian) {
            //     return [
            //         'display' => e($jurnal_harian->tanggal_pelaksanaan->format('m-d-Y')),
            //         'timestamp' => $jurnal_harian->tanggal_pelaksanaan->timestamp
            //     ];
            // })
                ->addColumn('nama_siswa', function (jurnal_harian $jurnal_harian) {
                    return $jurnal_harian->siswa->nama_siswa;
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
                ->editColumn('tanggal', function ($row) {
                    $tanggal = !empty(tanggal($row->tanggal)) ? tanggal($row->tanggal) : ''; // relasi user->siswa
                    return $tanggal;
                })
                ->editColumn('datang', function ($row) {
                    $datang = !empty(jam($row->datang)) ? jam($row->datang) : ''; // relasi user->siswa
                    return $datang;
                })
                ->editColumn('pulang', function ($row) {
                    $pulang = !empty(jam($row->pulang)) ? jam($row->pulang) : ''; // relasi user->siswa
                    return $pulang;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="../admin/jurnalH/detail/'.$data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    if(Auth::user()->role != 'kaprog' && Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu'   && Auth::user()->role != 'bkk' )
                    {
                    $button .= '&nbsp';
                    $button .= '<button   id="editButton" data-target="#editModal" data-attr="/admin/jurnalH/edit/' . $data->id . '" data-toggle="modal"  class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></button>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }


                    return $button;
                })
                ->rawColumns(['action', 'tanggal', 'datang', 'pulang'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah(Request $request)
    {
        if (Auth::user()->role == "kaprog") {
            return back();
        }
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
        $jurnal = jurnal_harian::find($id);
        return view('admin.jurnal_harian.detail',
         compact('sidebar','jurnal'));
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
        if (Auth::user()->role == "kaprog") {
            return back();
        }
            $data_prakerin = data_prakerin::all();
            $jurnalH = jurnal_harian::find($id)->first();
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
