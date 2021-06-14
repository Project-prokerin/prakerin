<?php

namespace App\Http\Controllers\admin\kelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Http\Requests\admin\kelasRequest;
use App\Models\jurusan;

class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.kelas.index');
    }
    public function ajax(request $request)
    {
        if ($request->ajax()) {
            $kelas = kelas::with('jurusan')->get();
            return datatables()->of($kelas)
                ->addColumn('action', function ($data) {
                    $button ='<a  href="/admin/kelas/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tambah()
    {
        return view('admin.kelas.tambah', ['jurusan' => jurusan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kelasRequest $request)
    {
        // dd($request);
        $validated = $request->validated();
        kelas::create($request->all());
        return redirect()->route('kelas.index')->with('success', 'Data berhasil di tambah!');

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
        $kelas = kelas::find($id);
        $jurusan = jurusan::all();
        return view('admin.kelas.edit', compact('kelas','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(kelasRequest $request, $id)
    {
        $validated = $request->validated();
        kelas::find($id)->update($request->all());
        return redirect()->route('kelas.index')->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kelas::destroy($id);
        return response()->json($data = 'berhasil');
    }
}
