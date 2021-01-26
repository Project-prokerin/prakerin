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
        // $request->validate([
        //     'email' => 'email',
        //     'password' =>    'min:7'
        // ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            //  jika rolenya kaprok
            if (Auth()->user()->role == 'kaprog ' || 'hubin') {
                return redirect('/admin');
            } else if (Auth()->user()->role == 'siswa') {
                return redirect('/siswa');
            }
        } else {
            return redirect('/')->withInput($request->only('email', 'password'));
        }
    }
}
