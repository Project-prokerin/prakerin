<?php

namespace App\Http\Controllers\admin\perusahaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\perusahaanRequest;
use App\Models\jurusan;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class perusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.perusahaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $perusahaan = perusahaan::orderby('id','DESC')->get();
            return datatables()->of($perusahaan)
            ->editColumn('bidang_usaha', function ($data) {
                if (empty($data->bidang_usaha)) {
                    return "Bidang usaha kosong";
                }
                return $data->bidang_usaha;
            })
                ->editColumn('tanggal_mou', function ($data) {
                    return $data->tanggal_mou->isoFormat('DD MMMM YYYY');
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/perusahaan/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';

                    if (Auth::user()->role != "kaprog" && Auth::user()->role != 'pembimbing' && Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu' ) {
                    $button .= '<a  href="/admin/perusahaan/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }
                    return $button;
                })
                ->rawColumns(['action','tanggal_mou'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah()
    {
        // if (Auth::user()->role != "kaprog") {
            return view('admin.perusahaan.tambah', ['jurusan' => jurusan::all()]);
        // }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(perusahaanRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $foto = $request->foto;
        $data['foto'] = ($foto) ? time().' '.$foto->getClientOriginalName() : '';
        ($foto) ? $request->file('foto')->move('images/perusahaan', $data['foto']) : '';
        perusahaan::create($data);
        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        if (Auth::user()->role != "kaprog") {
            return view('admin.perusahaan.detail', ['perusahaan' => perusahaan::find($id)]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role != "kaprog") {
            return view('admin.perusahaan.edit', ['perusahaan' => perusahaan::find($id), 'jurusan' => jurusan::all()]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(perusahaanRequest $request, $id)
    {
        $request->validated();
        $data = $request->all();
        unset($data['_token'], $data['_method'], $data['val']);
        if (!empty($data['foto'])) {
            $per = perusahaan::where('id', $id)->first();
            if (File::exists("images/perusahaan/$per->foto") && "images/perusahaan/$per->foto" !== "images/perusahaan/default.jpg") {
                File::delete("images/perusahaan/$per->foto");
            }
            $foto = $request->foto;
            $data['foto'] = ($foto) ? time() . ' ' . $foto->getClientOriginalName() : '';
            ($foto) ? $request->file('foto')->move('images/perusahaan', $data['foto']) : '';
        }else{
            $data['foto'] = $request->val;
        }
        perusahaan::where('id', $id)->update($data);
        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $per = perusahaan::where('id', $id)->first();
        if (File::exists("images/perusahaan/$per->foto") && "images/perusahaan/$per->foto" !== "images/perusahaan/default.jpg") {
            File::delete("images/perusahaan/$per->foto");
        }
        perusahaan::where('id',$id)->delete();
        return response()->json(['data' => 'berhasil']);
    }
    public function delete_all(Request $request){

    }


    public function template_excel()
    {
        $path = public_path('/file/Excel/Import Template/Template Excel perusahaan.xlsx');
        $name = basename($path);
        $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path, $name, $headers);

    }


  
}
