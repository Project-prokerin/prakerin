<?php

namespace App\Http\Controllers\admin\surat_keluar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surat_keluar;
class Surat_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case 'kepsek':
                return view('admin.surat_keluar.kepsek.index');
                break;
            case 'hubin':
                return view('admin.surat_keluar.hubin.index');
                break;
            case 'admin':
                return view('admin.surat_keluar.admin.index');
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {

        if ($request->ajax()) {
                    $surat = Surat_keluar::get();
                    return datatables()->of($surat)
                        ->addColumn('nama_surat', function ($surat) {
                            return $surat->detail_surat->template_surat->nama_surat;
                        })
                        ->addColumn('status', function($surat){
                            return $surat->status;
                        })
                        ->addColumn('jabatan', function ($surat) {
                            return $surat->untuk_guru->jabatan;
                        })
                        ->addColumn('tgl_surat', function($surat){
                            return $surat->detail_surat->tgl_surat;
                        })
                        ->addColumn('untuk', function ($surat) {
                            return $surat->untuk_guru->jabatan;
                        })
                        ->addColumn('dari', function ($surat) {
                            return $surat->dari_guru->jabatan;
                        })
                        ->addColumn('action', function ($surat) {
                            $role = Auth::user()->role;
                            if($role == "hubin" or $role == "kepsek"){
                                $button = '<a href="/admin/' .$role . '/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                                $button .= '&nbsp';
                                $button .= '<a href="/admin/'.$role.'/surat_keluar/detail/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                $button .= '&nbsp';
                                if($role == "hubin"){
                                $button .= '<a  href="/admin/' . $role . '/surat_keluar/edit/' . $surat->id . '" id="edit" data-toggle="tooltip"  data-id="' . $surat->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                                $button .= '&nbsp';
                                }
                                $button .= '<button type="button" name="delete" id="hapus" data-id="' . $surat->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                            }else if ($role == "admin") {
                                $button = '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                                $button .= '&nbsp';
                                $button .= '<a href="/admin/surat_keluar/detail/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                $button .= '&nbsp';
                                $button .= '<a  href="/admin/surat_keluar/edit/' . $surat->id . '" id="edit" data-toggle="tooltip"  data-id="' . $surat->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                                $button .= '&nbsp';
                                $button .= '<button type="button" name="delete" id="hapus" data-id="' . $surat->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                            }
                            return $button;
                        })
                        ->rawColumns(['action','nama_surat','tgl_surat','dari','untuk','nama','jabatan'])
                        ->addIndexColumn()->make(true);
                }
    }


    public function tambah()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat_keluar::destroy($id);
         return response()->json($data = 'berhasil');
    }
}
