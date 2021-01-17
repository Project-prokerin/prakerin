<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;

class viewController extends Controller
{
    // admin
    public function indexSiswa(){
        return view('admin.siswa.index');
    }
    // siswa
    public function indexAdmin()
    {
        return view('admin.admin.index');
    }
}
