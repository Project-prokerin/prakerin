<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Surat_masukController extends Controller
{
    public function index_TU()
    {
        return view('admin.surat_masuk.tu.index');
    }
}
