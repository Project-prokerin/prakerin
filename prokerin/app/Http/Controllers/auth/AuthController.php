<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use App\Models\guru;
use App\Models\kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

// eevnt

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout','time_log']]);
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

    public function time_log(Request $request)
    {
        $waktu = 'Logged in ' . session()->get('last_login_at')->locale('en_US')->diffForHumans();
        return response()->json($data = $waktu);
    }

    public function token($token){
        if (empty($token)) {
            return back();
        }
        // set cookie untuk token jika make url

        $jwt_token = JWT::decode($token, "1342423424324324234", array('HS256')); // decode token

        // mencari data user  yang sudah ada
        $user = User::where('username', $jwt_token->auth->username)->first();
        // cek role
        switch ($jwt_token->role) {
            case 'apiSiswa':
                $role = "siswa";
                break;
            case 'apiGuru':
                $role = $jwt_token->jabatan; // guru
                break;
            case 'apiManager':
                $role = $jwt_token->jabatan;
                break;
            default:
                # code...fggngn
                break;
        }
        // jika ada login lalu update
        if (Auth::attempt(['username' => $jwt_token->auth->username, 'password' => $jwt_token->auth->password])) {
            $user->update(['username' => $jwt_token->auth->username, 'password' => Hash::make($jwt_token->auth->password), 'role' => $role]);
            switch ($jwt_token->role) {
                case 'apiSiswa':
                    Siswa::where('id_user', $user->id)->update([
                        'nipd' => $jwt_token->user_data->nipd,
                        'nama_siswa' => $jwt_token->user_data->name,
                        'nisn' => 'empty',
                        'tempat_lahir' => 'empty',
                        'tanggal_lahir' => '0000-00-00',
                        'kelas' =>  $jwt_token->kelas->nama_kelas,
                        'jurusan' => $jwt_token->kelas->jurusan,
                    ]);
                    session()->regenerate();
                    return redirect('/user/dashboard');
                    break;
                    break;
                case 'apiGuru':
                case 'apiManager':
                    guru::where('id_user', $user->id)->update([
                        'nik' => $jwt_token->user_data->nik ,
                        'nama' =>  $jwt_token->user_data->name ,
                        'jabatan' => null,
                        'no_telp' => null,
                    ]);
                    session()->regenerate();
                    return redirect('/admin/dashboard');
                    break;
            }
        }else{ // jika password salah
            if(isset($user)){ // jik user masih ada setelah itu update sesuai sama role nya
                $user->update(['username' => $jwt_token->auth->username, 'password' => Hash::make($jwt_token->auth->password), 'role' => $role]);
                switch ($jwt_token->tole) {
                    case 'apiSiswa':
                        Siswa::where('id_user', $user->id)->update([
                            'nipd' => $jwt_token->user_data->nipd,
                            'nama_siswa' => $jwt_token->user_data->name,
                            'nisn' => 'empty',
                            'tempat_lahir' => 'empty',
                            'tanggal_lahir' => '0000-00-00',
                            'kelas' =>  $jwt_token->kelas->nama_kelas,
                            'jurusan' => $jwt_token->kelas->jurusan,
                        ]);
                        break;
                    case 'apiGuru':
                    case 'apiManager':
                        guru::where('id_user', $user->id)->update([
                            'nik' => $jwt_token->user_data->nik,
                            'nama' =>  $jwt_token->user_data->name,
                            'jabatan' => null,
                            'no_telp' => null,
                        ]);
                        break;
                }
                // attemp
                if (Auth::attempt(['username' => $jwt_token->username, 'password' => $jwt_token->password])) {
                    switch ($jwt_token->role) {
                        case 'siswa':
                            session()->regenerate();
                            return redirect('/user/dashboard');
                            break;
                        case  'bkk' or 'tu' or 'kepsek' or 'hubin' or 'kurikulum' or 'kesiswaan' or 'litbang' or 'sarpras':
                            session()->regenerate();
                            return redirect('/admin/dashboard');
                            break;
                    }
                }
            }else{ // jika user tisak ada buat baru
                if ($jwt_token->role == "apiSiswa") {
                    $user = User::create([
                        'username' => $jwt_token->auth->username,
                        'password' => Hash::make($jwt_token->auth->password),
                    ]);
                    $siswa = Siswa::create([
                        'nipd' => $jwt_token->user_data->nipd,
                        'nama_siswa' => $jwt_token->user_data->name,
                        'nisn' => 'empty',
                        'tempat_lahir' => 'empty',
                        'tanggal_lahir' => Carbon::now()->format('Y-m-d'),
                        'kelas' =>  $jwt_token->kelas->nama_kelas,
                        'jurusan' => $jwt_token->kelas->jurusan,
                        'id_user' => $user->id,
                    ]);
                    // attemp
                    if (Auth::attempt(['username' => $jwt_token->username, 'password' => $jwt_token->password])) {
                        session()->regenerate();
                        return redirect('/user/dashboard');
                    }
                } else {
                    $user = User::create([
                        'username' => $jwt_token->auth->username,
                        'password' => Hash::make($jwt_token->auth->password),
                    ]);
                    guru::where('id_user', $user->id)->update([
                        'nik' => $jwt_token->user_data->nik,
                        'nama' =>  $jwt_token->user_data->name,
                        'jabatan' => null,
                        'no_telp' => null,
                    ]);
                    if (Auth::attempt(['username' => $jwt_token->username, 'password' => $jwt_token->password])) {
                        session()->regenerate();
                        return redirect('/admin/dashboard');
                    }
                }

            }
        }
    }
}
