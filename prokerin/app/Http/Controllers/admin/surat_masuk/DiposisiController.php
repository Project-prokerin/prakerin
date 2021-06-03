<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;

class DiposisiController extends Controller
{

    public function index()
    {
        return view('admin.disposisi.kepsek.index');
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
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/disposisi/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/disposisi/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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
        return view('admin.disposisi.kepsek.detail');
    }
    // table surat
    public function tambah_disposisi($id)
    {
        $surat = Surat_masuk::find($id)->first();
        return view('admin.disposisi.kepsek.tambah', compact('surat'));
    }
    // table disposisi
    public function tambah($id)
    {
        $surat = Surat_masuk::find($id)->first();
        return view('admin.disposisi.kepsek.tambah', compact('surat'));
    }
    public function store(Request $request)
    {

    }
    public function edit($id = null)
    {
        $surat = Disposisi::find($id)->first();
        return view('admin.disposisi.kepsek.edit', compact('surat'));
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
        Disposisi::destroy($id);
        return response()->json($data = 'berhasil');
    }
}
