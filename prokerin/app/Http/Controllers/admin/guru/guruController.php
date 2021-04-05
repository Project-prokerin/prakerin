<?php

namespace App\Http\Controllers\admin\guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\guruRequest;
use Illuminate\Http\Request;
use App\Models\guru;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        return view('admin.guru.tambah');
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

        if ($jabatan == 'hubin' || $jabatan == 'bkk' || $jabatan == 'kaprog') {
            $guru = guru::create($request->all());
            $request->request->add(['id_guru' => $guru->id]);
            $user = user::create(['username' => $request->nik, 'password' => Hash::make('password'), 'role' => $request->jabatan, 'id_guru' => $request->id_guru]);

            return redirect()->route('guru.index')->with('success', 'Data berhasil di tambah!');
        } else {
            guru::create($request->all());
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
        return view('admin.guru.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = guru::where('id', $id)->first();
        return view('admin.guru.edit', compact('guru'));
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
        if ($jabatan == 'hubin' || $jabatan == 'bkk' || $jabatan == 'kaprog') {
            $guru = guru::where('id', $id)->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'jurusan' => $request->jurusan,
                'no_telp' => $request->no_telp
            ]);
            $user = user::where('id_guru',$id)->first();

            if (empty($user)) {
                user::create(['username' => $request->nik, 'password' => Hash::make('password'), 'role' => $request->jabatan, 'id_guru' => $id]);
            }else {
                user::where('id', $id)->update(['username' => $request->nik, 'role' => $request->jabatan]);
            }

            return
            redirect()->route('guru.index')->with('success', 'Data berhasil di tambah!');
            // if jabatan == kejurusan
        } else if($jabatan == 'kejuruan') {
            // cari user
            $user = user::where('id_guru', $id)->first();
            // jika use kosong
            if (empty($user)) {
                // update
                guru::where('id', $id)->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'jurusan' => $request->jurusan,
                    'no_telp' => $request->no_telp
                ]);
            }else {
                $user->delete();
                guru::where('id', $id)->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'jurusan' => $request->jurusan,
                    'no_telp' => $request->no_telp
                ]);
            }


            //
            return
            redirect()->route('guru.index')->with('success', 'Data berhasil di tambah!');
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
        guru::where('id', $id)->delete();
        User::where('id_guru', $id)->delete();
        return response()->json(['data' => 'berhasil']);
    }
    public function delete_all(Request $request){

    }
}
