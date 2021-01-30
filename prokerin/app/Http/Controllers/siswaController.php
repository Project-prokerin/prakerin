<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\kelompok_laporan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class siswaController extends Controller
{

    public function index(){

        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa','data'));
    }
    // menambahkan data user (jangan di ubah)
    public function store(Request $request){
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = 'siswa';
        $user->password = Hash::make($request->password);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $profile = Siswa::create($request->all());
        return redirect('/index')->with('data anda sudah di tambahkan');
    }
    // public function test(){
    //     $siswa = User::where('role','siswa')
    //             ->orderBy('id','ASC')
    //             ->get();
    //     dd($siswa);

    // }

}
