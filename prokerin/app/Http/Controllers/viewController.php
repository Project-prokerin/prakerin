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
    // test pimage
    public function imageTest(Request $request){

        dd($request->image);
    }
    public function post(Request $request)
    {

        foreach ($request->quantity as $index) {
            dd($request->quantity   );
        }
    }
    // admin
    public function indexAdmin()
    {
        return view('admin.siswa.index');
    }
}
