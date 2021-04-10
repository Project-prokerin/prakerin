<?php

namespace App\Http\Controllers\admin\jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jurnal_prakerin;
use App\Models\Siswa;
class jurnal_prakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.index', compact('sidebar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
       
        if ($request->ajax()) {
            $jurnalPrakerin = jurnal_prakerin::with('siswa')->with('perusahaan');
            return datatables()->of($jurnalPrakerin)
            ->editColumn('tanggal_pelaksanaan', function ($jurnal_prakerin) {
                return [
                    'display' => e($jurnal_prakerin->tanggal_pelaksanaan->format('m-d-Y')),
                    'timestamp' => $jurnal_prakerin->tanggal_pelaksanaan->timestamp
                ];
            })
            ->filterColumn('tanggal_pelaksanaan', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(tanggal_pelaksanaan,'%m-%d-%Y') LIKE ?", ["%$keyword%"]);
             })
             ->addColumn('id_siswa', function (jurnal_prakerin $jurnal_prakerin) {
                return $jurnal_prakerin->siswa->nama_siswa;
            })
            ->addColumn('id_perusahaan', function (jurnal_prakerin $jurnal_prakerin) {
                return $jurnal_prakerin->perusahaan->nama;
            })
            // ->editColumn('tgl_selesai', function ($dataPrakerin) {
            //     return [
            //         'display' => e($dataPrakerin->tgl_selesai->format('m-d-Y')),
            //         'timestamp' => $dataPrakerin->tgl_selesai->timestamp
            //     ];
            // })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></button>';
                    $button .= '&nbsp';
                    // $button .= '<a  href="../admin/jurnal/edit/'.$data->id.'" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.tambah', compact('sidebar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.detail', compact('sidebar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.edit', compact('sidebar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        jurnal_prakerin::where('id',$id)->delete();
        return response()->json($data = 'berhasil');
    }
    public function delete_all(Request $request)
    {

    }
}
