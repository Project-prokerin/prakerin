<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kelompok_laporan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
class viewController extends Controller
{

    // admin view
    public function dashboard()
    {
        $tahun = Carbon::now()->format('Y');
        $tahunDepan = Carbon::now()->addYear(1)->format('Y');
        return view('admin.dashboard',compact('tahun','tahunDepan'));
    }
}
