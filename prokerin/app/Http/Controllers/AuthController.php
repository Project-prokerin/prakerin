<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        // dd($request->username);
        if (Auth::attempt($request->only('username', 'password'))) {
            //  jika rolenya kaprok
            if (Auth()->user()->role == 'siswa') {
                return redirect('/siswa');
            }else if (Auth()->user()->role =='kaprog' || 'hubin' || 'bkk') {
                return redirect('/admin');
            }
        } else {
            return back()->withInput($request->only('usernamae', 'password'));
        }
    }
}
