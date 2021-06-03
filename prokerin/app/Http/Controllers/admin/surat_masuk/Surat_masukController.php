<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Surat_masukController extends Controller
{


    // route admin
    public function index_admin()
    {
        return view('admin.surat_masuk.admin.index');
    }
    public function ajax_admin(Request $request)
    {
        if ($request->ajax()) {
            $surat = Surat_masuk::get();
            return datatables()->of($surat)
                ->addColumn('nama', function ($data) {
                    return $data->surat_m->nama_surat;
                })
                ->addColumn('untuk', function ($data) {
                    return $data->untuk_guru->nama;
                })
                ->addColumn('jabatan', function ($data) {
                    return $data->untuk_guru->jabatan;
                })
                ->addColumn('disposisi', function ($data) {
                    if (!empty($data->surat_m->detail_surat->disposisi)) {
                        $id = $data->surat_m->detail_surat->disposisi->id;
                        $button = '<a href="/admin/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>'
                        . '' . ' <a href="/admin/surat_masuk/' . $id . '/disposisi/edit"   id="' . $id . '" class="edit btn btn-warning btn-sm">edit</a>'
                        . '' . ' <button type="button" name="delete" id="hapus-disposisi" data-id="' . $id . '" class="delete_disposisi btn btn-danger btn-sm">hapus</button>';
                    } else {
                        $button = '<a href="/admin/surat_masuk/' . $data->id . '/disposisi/tambah"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>';
                    }
                    return $button;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/surat_masuk/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                $button .= '<a  href="/admin/surat_masuk/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })

                ->rawColumns(['action', 'untuk', 'nama', 'jabatan', 'disposisi'])
                ->addIndexColumn()->make(true);
        }
    }

    // end route admin
    //  route tu
    public function index_TU()
    {
        return view('admin.surat_masuk.tu.index');
    }
    public function ajax_TU(Request $request)
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

    public function tambah_surat()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.surat_masuk.tu.tambah');
                break;
            case 'kepsek':
                return view('admin.surat_masuk.admin.tambah');
                break;
        }
    }

    // route buat semua admin & tu
    public function store_surat(Request $request)
    {

    }
    public function edit_surat($id)
    {
        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.surat_masuk.tu.edit', ['surat' => Surat_masuk::find($id)->get()]);
                break;
            case 'kepsek':
                return view('admin.surat_masuk.admin.edit', ['surat' => Surat_masuk::find($id)->get()]);
                break;
        }
    }
    public function update_surat(Request $request,$id)
    {
    }

    public function destroy_surat($id)
    {
        Surat_masuk::find($id)->delete();
        return response()->json($data = 'berhasil');
    }



    // end route tu

    // route kepsek
    public function index_kepsek()
    {
        return view('admin.surat_masuk.kepsek.index');
    }
    public function ajax_kepsek(Request $request)
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
                ->addColumn('disposisi', function ($data) {
                    if(!empty($data->surat_m->detail_surat->disposisi))
                    {
                        $id = $data->surat_m->detail_surat->disposisi->id;
                        $button = '<a href="/admin/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>'
                        .''.' <a href="/admin/surat_masuk/' . $id . '/disposisi/edit"   id="' . $id . '" class="edit btn btn-warning btn-sm">edit</a>'
                        .''.' <button type="button" name="delete" id="hapus-disposisi" data-id="' . $id . '" class="delete_disposisi btn btn-danger btn-sm">hapus</button>';
                    }else{
                        $button = '<a href="/admin/kepsek/surat_masuk/' . $data->id . '/disposisi/tambah"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>';
                    }
                    return $button;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/siswa/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })

                ->rawColumns(['action','untuk','nama','jabatan','disposisi'])
                ->addIndexColumn()->make(true);
        }
    }
    // end route kepsek

    // route pokja
    public function index_pokja()
    {
        return view('admin.surat_masuk.pokja.index');
    }
    public function ajax_pokja(Request $request)
    {
        if ($request->ajax()) {
            $surat = Disposisi::where('Pojkatujuan', Auth::user()->role)->get();
            return datatables()->of($surat)
            ->addColumn('nama', function ($data) {
                return $data->detail_surat->surat_m->nama_surat;
            })
            ->addColumn('dari', function($data){
                return $data->detail_surat->surat_m->surat_masuk->untuk_guru->nama;
            })
            ->addColumn('jabatan', function($data){
                return $data->detail_surat->surat_m->surat_masuk->untuk_guru->jabatan;
            })
            ->addColumn('status', function($data){
                return $data->detail_surat->surat_m->surat_masuk->status;
            })
            ->addColumn('disposisi', function ($data) {
                $id = $data->id;
                $button = '<a href="/admin/'. Auth::user()->role .'/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>';
                return $button;
        })
            ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/'.Auth::user()->role.'/surat_masuk/download/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/'.Auth::user()->role.'/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    return $button;
            })
            ->rawColumns(['action','dari','nama','jabatan','status','disposisi'])
            ->addIndexColumn()->make(true);
        }
    }
        public  function download()
        {
            dd("halo");
        }
        // ed route pokja







}