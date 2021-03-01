<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function postlogin(authRequest $request)
    {
        $validate = $request->validated();
        // $login = User::where('username', $request->username or 'password', $request->password)->first();
        // if (empty($login->username) || $login->username != $request->username) { // jika login kosong
        //     return redirect('/')->withInput()->withErrors(['username' => 'username anda salah']);
        // }
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth()->user()->role == 'siswa') {
                return redirect('/user/dashboard');
            } else if (Auth()->user()->role == 'kaprog' || 'hubin' || 'bkk') {
                return redirect('/dashboard/admin');
            }
        } else {
            return redirect('/')->withInput()->withErrors(['password' => 'password anda salah','username' => 'username anda salah']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
