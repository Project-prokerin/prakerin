<?php

namespace App\Http\Controllers\admin\penelusuran_tamatan;

use App\Http\Controllers\Controller;
use App\Models\alumni_siswa;
use App\Models\Penelusuran_tamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Auth;


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
            if (Auth::user()->role == 'bkk' or Auth::user()->role == 'admin') {
                $Penelusuran_tamatan = Penelusuran_tamatan::orderby('created_at','desc')->with('alumni_siswa')->get();
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
                        $button .= '<a  href="/admin/penelusuran_tamantan/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                        return $button;
                    })
                    ->rawColumns(['action','nama_siswa','tahun_lulus'])
                    ->addIndexColumn()->make(true);
            } else {
                $Penelusuran_tamatan = Penelusuran_tamatan::orderby('created_at','desc')->with('alumni_siswa')->get();
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
                        // $button .= '<a  href="/admin/penelusuran_tamantan/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        // $button .= '&nbsp';
                        // $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                        return $button;
                    })
                    ->rawColumns(['action','nama_siswa','tahun_lulus'])
                    ->addIndexColumn()->make(true);
            }
        }

    }
    public function option($id)
    {
        $alumni = alumni_siswa::where('id', $id)->first();
        return response()->json(compact('alumni'));
    }

    public function tambah()
    {
        $alumni = alumni_siswa::doesntHave('penelusuran_tamatan')->get();
        return view('admin.penelusuran_tamatan.tambah', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Penelusuran_tamatan::create($request->all());
        return redirect()->route('penelusuran_tamantan.index')->with('success', 'Data penelusuran tamatan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pen = Penelusuran_tamatan::where('id', $id)->first();
        return view('admin.penelusuran_tamatan.detail', compact('pen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumni = alumni_siswa::get();
        $pen = Penelusuran_tamatan::where('id',$id)->first();
        return view('admin.penelusuran_tamatan.edit', compact('alumni','pen'));
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
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        Penelusuran_tamatan::where('id',$id)->update($data);
        return redirect()->route('penelusuran_tamantan.index')->with('success', 'Data penelusuran tamatan berhasil di edit');
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
