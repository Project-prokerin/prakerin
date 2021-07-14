<?php

namespace App\Http\Controllers\admin\penelusuran_tamatan;

use App\Http\Controllers\Controller;
use App\Models\Penelusuran_tamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class Penelusuran_tamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penelusuran_tamatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $Penelusuran_tamatan = Penelusuran_tamatan::with('alumni_siswa')->get();
            return datatables()->of($Penelusuran_tamatan)
                ->addColumn('nama_siswa', function($data){
                    return $data->alumni_siswa->nama;
                })
                ->addColumn('tahun_lulus', function ($data) {
                    return $data->alumni_siswa->tahun_lulus;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/penelusuran_tamatan/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/penelusuran_tamatan/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','nama_siswa','tahun_lulus'])
                ->addIndexColumn()->make(true);
        }

    }
    public function create()
    {
        //
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
    public function show($id)
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
        Penelusuran_tamatan::destroy($id);
        return response()->json(['data' => 'berhasil']);
    }
}
