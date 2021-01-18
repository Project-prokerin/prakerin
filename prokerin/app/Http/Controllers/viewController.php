<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;

class viewController extends Controller
{
    // siswa
    public function indexSiswa(){
        return view('user.index');
    }
    // admin
    public function indexAdmin()
    {
        return view('admin.siswa.index');
    }
}
