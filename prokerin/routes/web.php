<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\viewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
// for pakage only
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;


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


// Route::get('/test', function () {
//     return view('coba');
// });

// untuk siswa disini
Route::middleware(['web', 'auth', 'role:siswa'])->group(function () {
    // memakai route view untuk view saja
    Route::get('/siswa', [viewController::class, 'indexSiswa']);

    // Route::get('/test', [siswaController::class, 'test']);
    // test pdf perusahaan
    Route::get('/perusahaan', [PDFController::class, 'perusahaan']);
});
// untuk admin disini
Route::middleware(['web', 'auth', 'role:kaprog,hubin'])->group(function () {
    // memakai route view untuk view saja
    Route::get('/admin', [viewController::class, 'indexAdmin']);

});


