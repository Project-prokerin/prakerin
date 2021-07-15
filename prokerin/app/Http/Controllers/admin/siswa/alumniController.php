<?php

namespace App\Http\Controllers\admin\siswa;

use App\Http\Controllers\Controller;
use App\Models\alumni_siswa;
use Illuminate\Http\Request;
use App\Http\Requests\admin\alumniRequest;
use App\Models\jurusan;
use Illuminate\Support\Facades\Auth;

class alumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alumni_siswa.index');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
                if (Auth::user()->role == 'bkk' or Auth::user()->role == 'admin') {
                    $siwa = alumni_siswa::orderby('created_at', 'desc')->get();
                    return datatables()->of($siwa)
                        ->addColumn('action', function ($data) {
                            $button = '<a href="/admin/siswa/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                            $button .= '&nbsp';
                            $button = '<a  href="/admin/alumni_siswa/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                            $button .= '&nbsp';
                            $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()->make(true);
                } else {
                    $siwa = alumni_siswa::orderby('created_at', 'desc')->get();
                    return datatables()->of($siwa)
                        ->addColumn('action', function ($data) {
                            $button = '<a href="/admin/siswa/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                            $button .= '&nbsp';
                            // $button = '<a  href="/admin/alumni_siswa/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                            // $button .= '&nbsp';
                            // $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()->make(true);
                }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = jurusan::all();
        return view('admin.alumni_siswa.tambah', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(alumniRequest $request)
    {
        $request->validated();
        alumni_siswa::create($request->all());
        return redirect()->route('alumni_siswa.index')->with('berhasil','Data alumni berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumni = alumni_siswa::where('id', $id)->first();
        return view('admin.alumni_siswa.detail', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumni = alumni_siswa::where('id',$id)->first();
        return view('admin.alumni_siswa.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(alumniRequest $request, $id)
    {
        $request->validated();
        alumni_siswa::where('id',$id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus
        ]);
        return redirect()->route('alumni_siswa.index')->with('berhasil', 'Data alumni berhasil di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        alumni_siswa::destroy($id);
        return response()->json(['data'=>'berhasil']);
    }
    public function download_template_excel()
    {
        $name = 'Template Excel.xlsx';
        $file = public_path() . "/file/Excel/Import Template/$name";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response()->download($file, $name, $headers);
    }
}
