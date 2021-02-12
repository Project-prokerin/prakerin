<?php
// untuk melihat user sama admin view

use App\Http\Controllers\admin\guru\guruController;
use App\Http\Controllers\admin\pembekalan\pembekalanContoller;
use App\Http\Controllers\viewController;
use App\Http\Controllers\auth\AuthController; //auth
use Illuminate\Support\Facades\Route;

//admin route
// ex App\Http\Controllers\admin\namaController;
use App\Http\Controllers\admin\siswa\siswaController;
// user route
// ex App\Http\Controllers\user\namaController;
use App\Http\Controllers\user\userController;

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


// route template
Route::get('/pagesSiswa', [viewController::class, 'pagesSiswa']);


    // admin
// untuk hubin disin
Route::middleware(['web', 'auth', 'role:hubin'])->group(function () {

    // data siswa
    Route::resource('siswa', 'admin\siswa\siswaController');
    Route::post('/siswa/destroy', [siswaController::class, 'delete_all'])->name('siswa.delete-all');

    // data guru
    Route::resource('guru', 'admin\guru\guruController');
    Route::post('/guru/destroy', [guruController::class, 'delete_all'])->name('guru.delete-all');

    // data perusahaan
    Route::resource('perusahaan', 'admin\perusahaan\perusahaanController');
    Route::post('/perushaaan/destroy', [siswaController::class, 'delete_all'])->name('perushaaan.delete-all');


});

// kaprog
Route::middleware(['web', 'auth', 'role:kaprog,hubin'])->group(function () {

});

// bkk
Route::middleware(['web', 'auth', 'role:bkk,hubin'])->group(function () {

    // pembekalan
    Route::resource('pembekalan', 'admin\pembekalan\pembekalanContoller');
    Route::post('/pembekalan/destroy', [pembekalanContoller::class, 'delete_all'])->name('pembekalan.delete-all');
    Route::get('/pembekalan/{id}/download', [pembekalanContoller::class, 'download'])->name('pembekalan.download');

});

// all admin
Route::middleware(['web', 'auth', 'role:bkk,hubin,kaprog'])->group(function () {
    Route::get('/dashboard/admin',  [ViewController::class, 'dashboard']);  // memakai route view untuk view saja
});


// untuk siswa/user di sini
Route::middleware(['web', 'auth', 'role:siswa'])->group(function () {
    // memakai route view untuk view saja
    Route::get('/user/dashboard', [userController::class, 'index'])->name('index.user'); //dashboard
    Route::get('/user/status', [userController::class, 'status'])->name('user.status');

    //profile
    Route::get('/user/profile', [userController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/edit', [userController::class, 'profile_edit'])->name('user.edit.profile');
    Route::put('/user/profile/{id}', [userController::class, 'profile_update'])->name('user.edit.profile');

    // ganti password
    Route::get('/user/ganti_password', [userController::class, 'ganti_password'])->name('ganti_password');
    Route::post('/user/ganti_password', [userController::class, 'ganti_password_post'])->name('ganti_password.post');

    // list perusahaan
    Route::get('/user/perusahaan', [userController::class, 'perusahaan'])->name('perusahaan');
    Route::post('/user/perusahaan/{id}', [userController::class, 'perusahaan_detail'])->name('perusahaan_detail.post');

    // pembekalan magang
    Route::get('/user/pembekalan', [userController::class, 'pembekalan'])->name('user.pembekalan');
    Route::post('/user/pembekalan', [userController::class, 'pembekalan_post'])->name('user.pembekalan.post');

    // jurnal prakerin
    Route::get('/user/jurnal', [userController::class, 'jurnal'])->name('user.jurnal');
    Route::get('/user/jurnal/create', [userController::class, 'jurnal_create'])->name('user.jurnal.create');
    Route::post('/user/jurnal', [userController::class, 'jurnal_post'])->name('user.jurnal.post');

    // jurnal harian
    Route::get('/user/jurnalH', [userController::class, 'jurnalH'])->name('user.jurnalH');
    Route::get('/user/jurnalH/create', [userController::class, 'jurnalH_create'])->name('user.jurnalH.create');
    Route::post('/user/jurnalH', [userController::class, 'jurnalH_post'])->name('user.jurnalH.post');

    // kelompok laporan
    Route::get('/user/kelompok_laporan', [userController::class, 'kelompok_laporan'])->name('user.kelompok_laporan');



    // test pdf perusahaan
    Route::get('/perusahaan', [PDFController::class, 'perusahaan']);
});
