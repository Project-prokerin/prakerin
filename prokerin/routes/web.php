<?php
// untuk melihat user sama admin view
use App\Http\Controllers\viewController;
use App\Http\Controllers\auth\AuthController; //auth
use Illuminate\Support\Facades\Route;

//admin route
// ex App\Http\Controllers\admin\namaController;

// user route
// ex App\Http\Controllers\user\namaController;


// for pakage only
use App\Http\Controllers\PDF\PDFController;
use App\Http\Controllers\Excel\ExcelController;


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


// untuk siswa/user disini
Route::middleware(['web', 'auth', 'role:siswa'])->group(function () {
    // memakai route view untuk view saja
    Route::get('/siswa', [viewController::class, 'index']);

    // test pdf perusahaan
    Route::get('/perusahaan', [PDFController::class, 'perusahaan']);
});


// admin
// untuk hubin disin
Route::middleware(['web', 'auth', 'role:hubin'])->group(function () {
});

// kaprog
Route::middleware(['web', 'auth', 'role:kaprog,hubin'])->group(function () {
});

// bkk
Route::middleware(['web', 'auth', 'role:bkk,hubin'])->group(function () {
});

// all acces
Route::middleware(['web', 'auth', 'role:bkk,hubin,kaprog'])->group(function () {
    Route::get('/dashboard',  [ViewController::class, 'dashboard']);  // memakai route view untuk view saja
});

