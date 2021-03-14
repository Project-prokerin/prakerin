<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
// eevnt

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function postlogin(authRequest $request)
    {
        $validate = $request->validated();
        $remember = $request->remember == 'on' ? true : false; // rememberme
        if (Auth::attempt($request->only('username', 'password'), $remember)) {
            if (Auth()->user()->role == 'siswa') {
                $request->session()->regenerate();
                return redirect('/user/dashboard');
            } else if (Auth()->user()->role == 'kaprog' || 'hubin' || 'bkk') {
                $request->session()->regenerate();
                return redirect('/admin/dashboard');
            }
        } else {
            return redirect('/')->withInput()->withErrors(['password' => 'password anda salah','username' => 'username anda salah']);
        }
    }
    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
    public function waktu_log(request $request)
    {
        $waktu = 'Logged in ' . session()->get('last_login_at')->locale('en_US')->diffForHumans();
        return response()->json(compact('waktu'));
    }
}
