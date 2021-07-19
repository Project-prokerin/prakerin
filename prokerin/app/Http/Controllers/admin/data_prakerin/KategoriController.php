<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\Kategori_nilai_prakerin;
use App\Models\kelas;
use App\Models\Nilai_prakerin;
use App\Models\Siswa;
use Database\Seeders\kategori_nilai_prakerinSeeder;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.kategori.index');
    }

    public function getNameColumn($val)
    {
        //
    }

    public function get_option()
    {
        //
    }

    public function ajax(Request $request)
    {
        //
    }

    public function tambah()
    {
        return view('admin.kategori.tambah');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
