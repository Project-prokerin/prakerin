<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;

class DiposisiController extends Controller
{

    public function index_Disposisi()
    {
        return view('admin.disposisi.kepsek.index');
    }

    public function ajax_Disposisi(Request $request)
    {
         if ($request->ajax()) {
            $surat = Surat_masuk::get();
            return datatables()->of($surat)
                ->addColumn('nama', function ($data) {
                    return $data->surat_m->nama_surat;
                })
                ->addColumn('untuk', function($data){
                    return $data->untuk_guru->nama;
                })
                ->addColumn('jabatan', function ($data) {
                    return $data->untuk_guru->jabatan;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/siswa/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/siswa/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','untuk','nama','jabatan'])
                ->addIndexColumn()->make(true);
        }
    }
}
