<?php
use App\Http\Controllers\viewController;
use App\Http\Controllers\auth\AuthController; //auth
use Illuminate\Support\Facades\Route;

//admin route
use App\Http\Controllers\admin\siswa\siswaController;
use App\Http\Controllers\admin\guru\guruController;
use App\Http\Controllers\admin\perusahaan\perusahaanController;
use App\Http\Controllers\admin\data_prakerin\data_prakerinController;
use App\Http\Controllers\admin\pembekalan\pembekalanContoller;
use App\Http\Controllers\admin\jurnal\jurnal_harianController;
use App\Http\Controllers\admin\jurnal\jurnal_prakerinController;
use App\Http\Controllers\admin\kelompok\kelompokController;
use App\Http\Controllers\admin\laporan\laporanController;
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


// Auth
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// route template
Route::get('/pagesSiswa', [viewController::class, 'pagesSiswa']);

// cek waktu login
Route::post('/log', [AuthController::class,'waktu_log'])->name('auth.time');


    // admin
// untuk hubin disin
Route::middleware(['web', 'auth', 'role:hubin'])->group(function () {

    // data siswa
    Route::get('admin/siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::post('admin/siswa/ajax', [siswaController::class, 'ajax'])->name('siswa.ajax');
    Route::get('admin/siswa/detail/{id}', [siswaController::class, 'detail'])->name('siswa.detail');
    Route::get('admin/siswa/tambah', [siswaController::class, 'tambah'])->name('siswa.tambah');
    Route::post('admin/siswa/post', [siswaController::class, 'store'])->name('siswa.post');
    Route::get('admin/siswa/edit/{id}', [siswaController::class, 'edit'])->name('siswa.edit');
    Route::put('admin/siswa/update/{id}', [siswaController::class, 'update'])->name('siswa.update');
    Route::delete('admin/siswa/delete/{id}', [siswaController::class, 'destroy'])->name('siswa.delete');
    Route::post('/siswa/excel/destroy', [siswaController::class, 'delete_all'])->name('siswa.delete-all');
    Route::get('/export/excel/siswa', [ExcelController::class, 'siswa'])->name('export.siswa');

    // data guru
    Route::get('admin/guru', [guruController::class, 'index'])->name('guru.index');
    Route::post('admin/guru/ajax', [guruController::class, 'ajax'])->name('guru.ajax');
    Route::get('admin/guru/detail/{id}', [guruController::class, 'detail'])->name('guru.detail');
    Route::get('admin/guru/tambah', [guruController::class, 'tambah'])->name('guru.tambah');
    Route::post('admin/guru/tambah/post', [guruController::class, 'store'])->name('guru.post');
    Route::get('admin/guru/edit/{id}', [guruController::class, 'edit'])->name('guru.edit');
    Route::put('admin/guru/update/{id}', [guruController::class, 'update'])->name('guru.update');
    Route::delete('admin/guru/delete/{id}', [guruController::class, 'destroy'])->name('guru.delete');
    Route::post('/guru/destroy', [guruController::class, 'delete_all'])->name('guru.delete-all');
    Route::get('/export/excel/guru', [ExcelController::class, 'guru'])->name('export.guru');

});

// kaprog
Route::middleware(['web', 'auth', 'role:kaprog,hubin'])->group(function () {

    // data prakerin
    Route::get('admin/data_prakerin', [data_prakerinController::class, 'index'])->name('data_prakerin.index');
    Route::post('admin/data_prakerin/ajax', [data_prakerinController::class, 'ajax'])->name('data_prakerin.ajax');
    Route::get('admin/data_prakerin/detail/{id}', [data_prakerinController::class, 'detail'])->name('data_prakerin.detail');
    Route::get('admin/data_prakerin/tambah', [data_prakerinController::class, 'tambah'])->name('data_prakerin.tambah');
    Route::post('admin/data_prakerin/tambah/post', [data_prakerinController::class, 'store'])->name('data_prakerin.post');
    Route::get('admin/data_prakerin/edit/{id}', [data_prakerinController::class, 'edit'])->name('data_prakerin.edit');
    Route::put('admin/data_prakerin/update/{data_prakerin}', [data_prakerinController::class, 'update'])->name('data_prakerin.update');
    Route::delete('admin/data_prakerin/delete/{id}', [data_prakerinController::class, 'destroy'])->name('data_prakerin.delete');
    Route::post('/data_prakerin/destroy', [data_prakerinController::class, 'delete_all'])->name('data_prakerin.delete-all');
    Route::get('/export/excel/data_prakerin', [ExcelController::class, 'data_prakerin'])->name('export.data_prakerin');


    // jurnal harian
    Route::get('admin/jurnalH', [jurnal_harianController::class, 'index'])->name('jurnalH.index');
    Route::post('admin/jurnalH/ajax', [jurnal_harianController::class, 'ajax'])->name('jurnalH.ajax');
    Route::get('admin/jurnalH/detail/{id}', [data_prakerinController::class, 'detail'])->name('jurnalH.detail');
    Route::get('admin/jurnalH/tambah', [jurnal_harianController::class, 'tambah'])->name('jurnalH.tambah');
    Route::post('admin/jurnalH/tambah/post', [jurnal_harianController::class, 'store'])->name('jurnalH.post');
    Route::get('admin/jurnalH/edit', [jurnal_harianController::class, 'edit'])->name('jurnalH.edit');
    Route::put('admin/jurnalH/update', [jurnal_harianController::class, 'update'])->name('jurnalH.update');
    Route::delete('admin/jurnalH/delete/{id}', [jurnal_harianController::class, 'destroy'])->name('jurnalH.delete');
    Route::post('/jurnalH/destroy', [jurnal_harianController::class, 'delete_all'])->name('jurnalH.delete-all');
    Route::get('/export/excel/jurnalH', [ExcelController::class, 'jurnalh'])->name('export.jurnalH');

    // jurnal prakerin
    Route::get('admin/jurnal', [jurnal_prakerinController::class, 'index'])->name('jurnal.index');
    Route::post('admin/jurnal/ajax', [jurnal_prakerinController::class, 'ajax'])->name('jurnal.ajax');
    Route::get('admin/jurnal/detail/{id}', [jurnal_prakerinController::class, 'detail'])->name('perusahaan.detail');
    Route::get('admin/jurnal/tambah', [jurnal_prakerinController::class, 'tambah'])->name('jurnal.tambah');
    Route::post('admin/jurnal/tambah/post', [jurnal_prakerinController::class, 'store'])->name('jurnal.post');
    Route::get('admin/jurnal/edit/{id}', [jurnal_prakerinController::class, 'edit'])->name('jurnal.edit');
    Route::put('admin/jurnal/update/{jurnal_prakerin}', [jurnal_prakerinController::class, 'update'])->name('jurnal.update');
    Route::delete('admin/jurnal/delete/{id}', [jurnal_prakerinController::class, 'destroy'])->name('jurnal.delete');
    Route::post('/jurnal/destroy', [jurnal_prakerinController::class, 'delete_all'])->name('jurnal.delete-all');
    Route::get('/export/excel/jurnal', [ExcelController::class, 'jurnalh'])->name('export.jurnal');

    // kelompok magang
    Route::get('admin/kelompok', [kelompokController::class, 'index'])->name('kelompok.index');
    Route::get('admin/kelompok/ajax', [kelompokController::class, 'ajax'])->name('kelompok.ajax');
    Route::get('admin/kelompok/detail/{id}', [kelompokController::class, 'detail'])->name('kelompok.detail');
    Route::get('admin/kelompok/tambah', [kelompokController::class, 'tambah'])->name('kelompok.tambah');
    Route::post('admin/kelompok/tambah/post', [kelompokController::class, 'store'])->name('kelompok.post');
    Route::get('admin/kelompok/edit/{id}', [kelompokController::class, 'edit'])->name('kelompok.edit');
    Route::put('admin/kelompok/update/{kelompok}', [kelompokController::class, 'update'])->name('kelompok.update');
    Route::delete('admin/kelompok/delete/{id}', [kelompokController::class, 'destroy'])->name('kelompok.delete');
    Route::post('admin/kelompok/ajax', [kelompokController::class, 'ajax'])->name('kelompok.ajax');
    Route::delete('/kelompok/destroy_all/{id}', [kelompokController::class, 'delete_all'])->name('kelompok.delete-all');
    Route::get('/export/excel/kelompok', [ExcelController::class, 'kelompok'])->name('export.kelompok');
    Route::get('/export/pdf/kelompok', [PDFController::class, 'kelompokPrakerin']);

    // laporan magang
    Route::get('admin/laporan', [laporanController::class, 'index'])->name('laporan.index');
    Route::post('admin/laporan/ajax', [laporanController::class, 'ajax'])->name('laporan.ajax');
    Route::get('admin/laporan/detail/{id}', [laporanController::class, 'detail'])->name('laporan.detail');
    Route::get('admin/laporan/tambah', [laporanController::class, 'tambah'])->name('laporan.tambah');
    Route::post('admin/laporan/tambah/post', [laporanController::class, 'store'])->name('laporan.post');
    Route::get('admin/laporan/edit', [laporanController::class, 'edit'])->name('laporan.edit');
    Route::put('admin/laporan/update', [laporanController::class, 'update'])->name('laporan.update');
    Route::delete('admin/laporan/delete/{id}', [perusahaanController::class, 'destroy'])->name('laporan.delete');
    Route::post('/laporan/destroy', [laporanController::class, 'delete_all'])->name('laporan.delete-all');
    Route::get('/export/excel/laporan', [ExcelController::class, 'perusahaan'])->name('export.laporan');

    // data perusahaan
    Route::get('admin/perusahaan', [perusahaanController::class, 'index'])->name('perusahaan.index');
    Route::post('admin/perusahaan/ajax', [perusahaanController::class, 'ajax'])->name('perusahaan.ajax');
    Route::get('admin/perusahaan/detail/{id}', [perusahaanController::class, 'detail'])->name('perusahaan.detail');
    Route::get('admin/perusahaan/tambah', [perusahaanController::class, 'tambah'])->name('perusahaan.tambah');
    Route::post('admin/perusahaan/tambah/post', [perusahaanController::class, 'store'])->name('perusahaan.post');
    Route::get('admin/perusahaan/edit/{id}', [perusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('admin/perusahaan/update/{id}', [perusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('admin/perusahaan/delete/{id}', [perusahaanController::class, 'destroy'])->name('perusahaan.delete');
    Route::post('/perusahaan/destroy', [perusahaanController::class, 'delete_all'])->name('perusahaan.delete-all');
    Route::get('/export/excel/perusahaan', [ExcelController::class, 'perusahaan'])->name('export.perusahaan');
    Route::get('/export/pdf/perusahaan', [PDFController::class, 'perusahaan']);

});

// bkk
Route::middleware(['web', 'auth', 'role:bkk,hubin'])->group(function () {

    // pembekalan
    Route::get('admin/pembekalan', [pembekalanContoller::class, 'index'])->name('pembekalan.index');
    Route::post('admin/pembekalan/ajax', [pembekalanContoller::class, 'ajax'])->name('pembekalan.ajax');
    Route::get('admin/pembekalan/detail/{id}', [pembekalanContoller::class, 'detail'])->name('pembekalan.detail');
    Route::get('admin/pembekalan/tambah', [pembekalanContoller::class, 'tambah'])->name('pembekalan.tambah');
    Route::post('admin/pembekalan/tambah/post', [pembekalanContoller::class, 'store'])->name('pembekalan.post');
    Route::get('admin/pembekalan/edit/{id}', [pembekalanContoller::class, 'edit'])->name('pembekalan.edit');
    Route::put('admin/pembekalan/update/{pembekalan}', [pembekalanContoller::class, 'update'])->name('pembekalan.update');
    Route::delete('admin/pembekalan/delete/{id}', [pembekalanContoller::class, 'destroy'])->name('pembekalan.delete');
    Route::post('/pembekalan/destroy', [pembekalanContoller::class, 'delete_all'])->name('pembekalan.delete-all');
    Route::get('/export/excel/pembekalan', [pembekalanContoller::class, 'pembekalan'])->name('export.pembekalan');
    Route::get('/pembekalan/{id}/download', [pembekalanContoller::class, 'downloads'])->name('pembekalan.download');

});

// all admin
Route::middleware(['web', 'auth', 'role:bkk,hubin,kaprog'])->group(function () {

    Route::get('/admin/dashboard',  [ViewController::class, 'dashboard'])->name('admin.dashboard');  // memakai route view untuk view saja
    Route::get('/export/excel/pembekalan', [ExcelController::class, 'pembekalan'])->name('export.pembekalan');
    Route::get('/export/excel/siswa', [ExcelController::class, 'siswa'])->name('export.siswa');
    Route::get('/export/excel/jurnalh', [ExcelController::class, 'jurnalh'])->name('export.jurnalh');
    Route::get('/export/excel/jurnalp', [ExcelController::class, 'jurnalp'])->name('export.jurnalp');

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
    Route::get('/user/perusahaan', [userController::class, 'perusahaan'])->name('user.perusahaan');
    Route::get('/user/perusahaan/api', [userController::class, 'ajaxperusahaan'])->name('user.perusahaan.api');
    Route::get('/user/perusahaan/{id}', [userController::class, 'perusahaan_detail'])->name('user.perusahaan.detail');

    // pembekalan magang
    Route::get('/user/pembekalan', [userController::class, 'pembekalan'])->name('user.pembekalan');
    Route::put('/user/pembekalan/delete', [userController::class, 'pembekalan_delete'])->name('user.pembekalan.delete');
    Route::get('/user/pembekalan/{id}', [userController::class, 'pembekalan_download'])->name('user.pembekalan.download');
    Route::post('/user/pembekalan', [userController::class, 'pembekalan_post'])->name('user.pembekalan.post');

    // jurnal prakerin
    Route::get('/user/jurnal', [userController::class, 'jurnal'])->name('user.jurnal');
    Route::post('/user/jurnal/Api', [userController::class, 'jurnalApi'])->name('user.jurnal.Api');
    Route::get('/user/jurnal/tambah', [userController::class, 'jurnal_tambah'])->name('user.jurnal.tambah');
    Route::post('/user/jurnal', [userController::class, 'jurnal_post'])->name('user.jurnal.post');

    // jurnal harian
    Route::get('/user/jurnalH', [userController::class, 'jurnalH'])->name('user.jurnalH');
    Route::post('/user/jurnal/HApi', [userController::class, 'jurnalHApi'])->name('user.jurnalH.Api');
    Route::post('/user/jurnalH', [userController::class, 'jurnalH_post'])->name('user.jurnalH.post');

    // kelompok laporan
    Route::get('/user/kelompok_laporan', [userController::class, 'kelompok_laporan'])->name('user.kelompok_laporan');

});
