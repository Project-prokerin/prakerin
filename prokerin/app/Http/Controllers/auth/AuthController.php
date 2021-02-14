<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5'
        ]);
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth()->user()->role == 'siswa') {
                return redirect('/user/dashboard');
            } else if (Auth()->user()->role == 'kaprog' || 'hubin' || 'bkk') {
                return redirect('/dashboard/admin');
            }
        } else {
            return back()->withInput($request->only('username', 'password'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
