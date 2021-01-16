<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);


// untuk siswa
Route::middleware(['web', 'auth', 'role:siswa'])->group(function () {
    Route::get('/wellcome', function () {
        return view('welcome');
    });
});
// untuk admin
Route::middleware(['web', 'auth', 'role:kaprok,hubin'])->group(function () {
    Route::get('/coba', function () {
        return view('testAdmin');
    });
});
