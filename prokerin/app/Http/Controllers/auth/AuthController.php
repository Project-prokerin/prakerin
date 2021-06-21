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
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function index()
    {
        return view('auth.login');
    }
    public function postlogin(authRequest $request)
    {
        $validate = $request->validated();
        $remember = $request->remember == 'on' ? true : false; // rememberme
        if (Auth::attempt($request->only('username', 'password'), $remember)) {
            switch (Auth()->user()->role) {
                case 'siswa':
                    $request->session()->regenerate();
                    return redirect('/user/dashboard');
                    break;
                case  'bkk' or 'tu' or 'kepsek' or'hubin' or 'kurikulum' or 'kesiswaan' or 'litbang' or 'sarpras':
                    $request->session()->regenerate();
                    return redirect('/admin/dashboard');
                    break;
            }
        } else {
            return redirect('/')->withInput()->withErrors(['password' => 'password anda salah','username' => 'username anda salah']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
    public function waktu_log(Request $request)
    {
        $waktu = 'Logged in ' . session()->get('last_login_at')->locale('en_US')->diffForHumans();
        return response()->json($data = $waktu);
    }
}
