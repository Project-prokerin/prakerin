<?php

namespace App\Http\Controllers\admin\guru;

use App\Http\Controllers\Controller;
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
        if ($request->ajax()) {
            //  ambil semua user
            $data = guru::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) { // menambahkan button
                    $input = '<input type="checkbox" class="cb-child" ata-toggle="tooltip" data-original-title="checkbox" data-id="' . $row->id . '" value="' . $row->id . '">';
                    return $input;
                })
                ->addColumn('action', function ($row) {
                    // button show
                    $btn0 = '<a href="/siswa/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-search"></i></a>';
                    // button update
                    $btn1 = $btn0 . ' <a href="/guru/' . $row->id . '/editar" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="fas fa-pencil-alt"></i></a>';
                    // button delete
                    $btn1 = $btn1 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                    return $btn1;
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
            return response()->json(compact('data'));
        }
        return view('admin.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan = $request->jabatan;

        if ($jabatan == 'hubin' || $jabatan == 'bkk' || $jabatan == 'kaprog') {
            $user = User::where('role' , $request->jabatan)->count();
            if ($user >= 5) {
                return back()->with('fail', 'Kapasitas jabatan sudah penuh');
            }
            $user = user::create(['username'=> $request->nik,'password'=> Hash::make('password'),'role' => $request->jabatan]);
            $request->request->add(['user_id' => $user->id]);
            guru::create($request->all());
            return redirect('guru')->with('success', 'data berhasil di tambahkan');
        }else{
            $jurusan = guru::where('jurusan', $request->jurusan)->count();
            if ($jurusan >= 5) {
                return back()->with('fail', 'Kapasitas jurusan sudah penuh');
            }
            guru::create(['nik'=> $request->nik,'nama'=>$request->nama,'jabatan'=>$request->jabatan,'jurusan'=>$request->jurusan,'no_telp'=>$request->no_telp]);
            return redirect('guru')->with('success', 'data berhasil di tambahkan');
        }
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
        // dd($id);
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
    public function update(Request $request, $id)
    {
        $jabatan = $request->jabatan;
        if ($jabatan == 'hubin' || $jabatan == 'bkk' || $jabatan == 'kaprog') {
            $user = User::where('role', $request->jabatan)->count();
            $guru = guru::where('id', $id)->first();
            if ($user >= 5) {
                return back()->with('fail', 'Kapasitas jabatan sudah penuh');
            }
            $user = user::where('id',$guru->user->id)->update(['username' => $request->nik, 'password' => Hash::make('password'), 'role' => $request->jabatan]);
            $request->request->add(['user_id' => $user->id]);
            guru::where('id', $id)->update($request->all());
            return redirect('guru')->with('success', 'data berhasil di tambahkan');
        } else {
            $jurusan = guru::where('jurusan', $request->jurusan)->count();
            if ($jurusan >= 5) {
                return back()->with('fail', 'Kapasitas jurusan sudah penuh');
            }
            guru::where('id', $id)->update(['nik' => $request->nik, 'nama' => $request->nama, 'jabatan' => $request->jabatan, 'jurusan' => $request->jurusan, 'no_telp' => $request->no_telp]);
            return redirect('guru')->with('success', 'data berhasil di tambahkan');
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
        $guru = guru::where('id', $id)->first();
        if (!empty($guru->user->id)) {
            User::where('id', $guru->user->id)->delete();
            guru::where('id', $guru->id)->delete();
        }else{
            guru::where('id', $guru->id)->delete();
        }
        return response()->json(['success'=>'success']);
    }
    public function delete_all(Request $request){
        $guru = guru::whereIn('id', $request->id)->get();
        foreach ($guru as $gurus) {
            if (!empty($gurus->user->id)) {
            User::where('id', $gurus->user->id)->delete();
            guru::where('id', $gurus->id)->delete();
            } else {
                guru::where('id', $gurus->id)->delete();
            }
        }

        return response()->json([compact('guru')]);
    }
}
