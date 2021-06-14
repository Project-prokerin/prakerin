<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Surat_masuk;
use App\Models\Detail_surat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class DiposisiController extends Controller
{

    public function index()
    {
        return view('admin.disposisi.index');
    }
    public function ajax(Request $request)
    {
         if ($request->ajax()) {
            $surat = Disposisi::get();
            return datatables()->of($surat)
                ->addColumn('surat', function ($data) {
                    return $data->detail_surat->surat_m->nama_surat;
                })
                ->addColumn('untuk', function ($data) {
                    return $data->pokjatujuan;
                })
                ->addColumn('keterangan', function ($data) {
                    return $data->Keterangan_disposisi;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="admin/disposisi/detail/'.$data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/disposisi/edit/'. $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','untuk'])
                ->addIndexColumn()->make(true);
        }
    }
    public function detail($id)
    {
        return view('admin.disposisi.detail');
    }
    // table surat
    public function tambah_disposisi($id)
    {
        $surat = $id;
        // $surat = Detail_surat::find($id)->first();
        // dd($surat);
        // dd($id);
        return view('admin.disposisi.tambah', compact('surat'));
    }
    // table disposisi
    public function tambah($id)
    {

        $surat = Surat_masuk::find($id)->first();
        return view('admin.disposisi.tambah', compact('surat'));
    }
    public function store(Request $request,$id)
    {
        // dd($id);
        // $surat_detail_surat = Detail_surat::where('id',$id)->first();
            // dd($surat_detail_surat);
        Disposisi::create([
            'Pokjatujuan' => $request->Pokjatujuan,
            'Keterangan_disposisi' =>  $request->Keterangan_disposisi,
            'id_detail_surat' => $id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('disposisi.admin.index')->with('pesan','Berhasil tambah disposisi!');

    }
    public function edit($id = null)
    {
        $surat = Disposisi::find($id);
        // dd($surat->id);
        return view('admin.disposisi.edit', compact('surat'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        Disposisi::find($id)->update([
            'Pokjatujuan' => $request->Pokjatujuan,
            'Keterangan_disposisi' =>  $request->Keterangan_disposisi,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('disposisi.admin.index')->with('pesan','Berhasil Update disposisi!');




    }
    public function destroy($id)
    {
        Disposisi::destroy($id);
        return response()->json($data = 'berhasil');
    }
}
