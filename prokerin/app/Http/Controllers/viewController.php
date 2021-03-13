<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kelompok_laporan;
use Illuminate\Http\Request;

class viewController extends Controller
{

    // admin view
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
