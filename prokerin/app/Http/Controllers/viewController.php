<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kelompok_laporan;
use Illuminate\Http\Request;

class viewController extends Controller
{
    // siswa
    public function indexSiswa(){
        // untuk perucobaan mengambil data di table no tapi dengan cara unique
        $test = kelompok_laporan::all();
        $unique = $test->unique('no');
        $unique->values()->all();

        // dd($unique);
        $user = User::all();
        return view('siswa.index', compact('user','unique'));
    }

    // admin
    public function indexAdmin()
    {
        return view('admin.siswa.index');
    }
}
