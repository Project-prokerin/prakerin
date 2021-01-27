<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class viewController extends Controller
{
    // siswa
    public function indexSiswa(){
        $user = User::all();

        return view('siswa.index', compact('user'));
    }

    // admin
    public function indexAdmin()
    {
        return view('admin.siswa.index');
    }
}
