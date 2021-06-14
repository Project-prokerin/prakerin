<?php

namespace App\Http\Controllers\admin\guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\guruRequest;
use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\jurusan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\kelas;
class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(request $request)
    {
        if ($request->ajax()) {
            $guru = guru::all();
            return datatables()->of($guru)
            ->editColumn('jurusan', function ($data) {
                if (!empty($data->jurusan->singkatan_jurusan)) {
                   return $data->jurusan->singkatan_jurusan;
                }else {
                    return "Jurusan Kosong";
                }
                // return $data->kelas->jurusan;
            })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/guru/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .='<a  href="/admin/guru/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah()
    {
        return view('admin.guru.tambah', ['jurusan' => jurusan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(guruRequest $request)
    {
        $validated = $request->validated();
        $jabatan = $request->jabatan;

        if ($jabatan == 'kejuruan') {
            guru::create($request->all());
            return redirect()->route('guru.index')->with('success', 'Data berhasil di tambah!');
        } else {
            $user = user::create(['username' => $request->nik, 'password' => Hash::make('password'), 'role' => $request->jabatan]);
            $request->request->add(['id_user' => $user->id]);
            $guru = guru::create($request->all());
            return redirect()->route('guru.index')->with('success', 'Data berhasil di tambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return view('admin.guru.detail', ['guru' => guru::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.guru.edit',  ['guru' => guru::find($id), 'jurusan' => jurusan::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(guruRequest $request, $id)
    {
        $validated = $request->validated();
        $jabatan = $request->jabatan;
        if ($jabatan == 'kejuruan') {
            // cari guru
            $guru = guru::where('id', $id)->first();
            // jika use kosong
            if (empty($guru->user)) {
                // update
                guru::where('id', $id)->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'id_jurusan' => $request->id_jurusan,
                    'no_telp' => $request->no_telp
                ]);
            } else {
                // delete user and update guru
                $guru->user->delete();
                guru::where('id', $id)->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'id_jurusan' => $request->id_jurusan,
                    'no_telp' => $request->no_telp
                ]);
            }
            return
                redirect()->route('guru.index')->with('success', 'Data berhasil di edit!');

        } else  {
            $guru = guru::where('id', $id)->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'id_jurusan' => $request->id_jurusan,
                'no_telp' => $request->no_telp
            ]);
            $cekguru = guru::where('id', $id)->first();

            if (empty($cekguru)) {
                user::create(['username' => $request->nik, 'password' => Hash::make('password'), 'role' => $request->jabatan]);
            } else {
                user::where('id', $cekguru->id)->update(['username' => $request->nik, 'role' => $request->jabatan]);
            }

            return
                redirect()->route('guru.index')->with('success', 'Data berhasil di edit!');
            // if jabatan == kejurusan
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::where('id', $id)->first(); // cari guru
        $guru->user()->delete(); // delete user
        $guru->delete(); // delete guru
        return response()->json(['data' => 'berhasil']);
    }
    public function delete_all(Request $request){

    }
}
