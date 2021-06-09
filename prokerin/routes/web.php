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
use App\Http\Controllers\admin\kelas\kelasController;
use App\Http\Controllers\admin\surat_masuk\Surat_masukController;
use App\Http\Controllers\admin\surat_masuk\DiposisiController;
use App\Http\Controllers\admin\surat_keluar\Surat_keluarController;
// user routeus
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
Route::post('/log', [AuthController::class,'waktu_log'])->name('auth.time');


// all admin
Route::middleware(['web', 'auth', 'role:bkk,hubin,kaprog,kepsek,tu,kurikulum,kesiswaan,litbang,admin,sarpras'])->group(function () {

    Route::get('/admin/dashboard',  [ViewController::class, 'dashboard'])->name('admin.dashboard');  // memakai route
    Route::post('/admin/dashboard/ajax',  [ViewController::class, 'ajax'])->name('dashboard.ajax');  // memakai route view untuk view saja
    Route::get('/export/excel/pembekalan', [ExcelController::class, 'pembekalan'])->name('export.pembekalan');
    Route::get('/export/excel/siswa', [ExcelController::class, 'siswa'])->name('export.siswa');
    Route::get('/export/excel/jurnalh', [ExcelController::class, 'jurnalh'])->name('export.jurnalh');
    Route::get('/export/excel/jurnalp', [ExcelController::class, 'jurnalp'])->name('export.jurnalp');
});


// route admin (data master ..ect)
Route::prefix('admin')->middleware(['web', 'auth', 'role:admin'])->group(function () {
    // data siswa
    Route::get('siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::post('siswa/ajax', [siswaController::class, 'ajax'])->name('siswa.ajax');
    Route::get('siswa/detail/{id}', [siswaController::class, 'detail'])->name('siswa.detail');
    Route::get('siswa/tambah', [siswaController::class, 'tambah'])->name('siswa.tambah');
    Route::post('siswa/post', [siswaController::class, 'store'])->name('siswa.post');
    Route::get('siswa/edit/{id}', [siswaController::class, 'edit'])->name('siswa.edit');
    Route::put('siswa/update/{id}', [siswaController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/delete/{id}',[siswaController::class, 'destroy'])->name('siswa.delete');
    Route::post('/siswa/excel/destroy', [siswaController::class, 'delete_all'])->name('siswa.delete-all');
    Route::get('/export/excel/siswa', [ExcelController::class, 'siswa'])->name('export.siswa');

    // data guru
    Route::get('guru', [guruController::class, 'index'])->name('guru.index');
    Route::post('guru/ajax', [guruController::class, 'ajax'])->name('guru.ajax');
    Route::get('guru/detail/{id}', [guruController::class, 'detail'])->name('guru.detail');
    Route::get('guru/tambah', [guruController::class, 'tambah'])->name('guru.tambah');
    Route::post('guru/tambah/post', [guruController::class, 'store'])->name('guru.post');
    Route::get('guru/edit/{id}', [guruController::class, 'edit'])->name('guru.edit');
    Route::put('guru/update/{id}', [guruController::class, 'update'])->name('guru.update');
    Route::delete('guru/delete/{id}', [guruController::class, 'destroy'])->name('guru.delete');
    Route::post('/guru/destroy', [guruController::class, 'delete_all'])->name('guru.delete-all');
    Route::get('/export/excel/guru', [ExcelController::class, 'guru'])->name('export.guru');

    // data kelas
    Route::get('kelas', [kelasController::class, 'index'])->name('kelas.index');
    Route::post('kelas/ajax', [kelasController::class, 'ajax'])->name('kelas.ajax');
    Route::get('kelas/detail/{id}', [kelasController::class, 'detail'])->name('kelas.detail');
    Route::get('kelas/tambah', [kelasController::class, 'tambah'])->name('kelas.tambah');
    Route::post('kelas/tambah/post', [kelasController::class, 'store'])->name('kelas.post');
    Route::get('kelas/edit/{id}', [kelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/update/{id}', [kelasController::class, 'update'])->name('kelas.update');
    Route::delete('kelas/delete/{id}', [kelasController::class, 'destroy'])->name('kelas.delete');
    Route::post('/kelas/destroy', [kelasController::class, 'delete_all'])->name('kelas.delete-all');
    Route::get('/export/excel/kelas', [ExcelController::class, 'guru'])->name('export.kelas');

    // data surat
    Route::get('surat_masuk', [Surat_masukController::class, 'index_admin'])->name('admin.surat_masuk.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_admin'])->name('admin.surat_masuk.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_surat'])->name('admin.surat_masuk.detail');
    Route::get('surat_masuk/tambah', [Surat_masukController::class, 'tambah_surat'])->name('admin.surat_masuk.tambah');
    Route::post('surat_masuk/post', [Surat_masukController::class, 'store_surat'])->name('admin.surat_masuk.post');
    Route::get('surat_masuk/edit/{id}', [Surat_masukController::class, 'edit_surat'])->name('admin.surat_masuk.edit');
    Route::put('surat_masuk/update/{id}', [Surat_masukController::class, 'update_surat'])->name('admin.surat_masuk.update');
    Route::delete('surat_masuk/delete/{id}', [Surat_masukController::class, 'destroy_surat'])->name('admin.surat_masuk.delete');
    Route::delete('surat_masuk/donwload/{id}', [Surat_masukController::class, 'download'])->name('admin.surat_masuk.download');

    // disposisi table surat
    Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('desposisi.view');
    Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('desposisi.tambah');
    Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('desposisi.edit');


    // table disposisi
    Route::get('disposisi', [DiposisiController::class, 'index'])->name('disposisi.admin.index');
    Route::post('disposisi/ajax', [DiposisiController::class, 'ajax'])->name('disposisi.admin.ajax');
    // Route::get('disposisi/detail/{id}', [DiposisiController::class, 'detail'])->name('disposisi.admin.detail');
    Route::get('disposisi/tambah/', [DiposisiController::class, 'tambah'])->name('disposisi.admin.tambah');
    Route::patch('disposisi/post/{id}', [DiposisiController::class, 'store'])->name('disposisi.admin.post'); // update disposisi
    Route::get('disposisi/edit/{id}', [DiposisiController::class, 'edit'])->name('disposisi.admin.edit'); // edit disposisi biasa
    Route::put('disposisi/update/{id}', [DiposisiController::class, 'update'])->name('disposisi.admin.update'); // update disposisi
    Route::delete('disposisi/delete/{id}', [DiposisiController::class, 'destroy'])->name('disposisi.admin.delete'); // table disposisi


    Route::get('surat_keluar', [Surat_keluarController::class, 'index'])->name('admin.surat_keluar.index');
    Route::post('surat_keluar/ajax', [Surat_keluarController::class, 'ajax'])->name('admin.surat_keluar.ajax');
    Route::get('surat_keluar/detail/{id}', [Surat_keluarController::class, 'detail'])->name('admin.surat_keluar.detail');
    Route::get('surat_keluar/tambah', [Surat_keluarController::class, 'tambah'])->name('admin.surat_keluar.tambah');
    Route::post('surat_keluar/post', [Surat_keluarController::class, 'store'])->name('admin.surat_keluar.post');
    Route::put('surat_keluar/tambahh', [Surat_keluarController::class, 'tambahh'])->name('admin.surat_keluar.tambahh');
    Route::get('surat_keluar/edit/{id}', [Surat_keluarController::class, 'edit'])->name('admin.surat_keluar.edit');
    Route::put('surat_keluar/update/{id}', [Surat_keluarController::class, 'update'])->name('admin.surat_keluar.update');
    Route::delete('surat_keluar/delete/{id}', [Surat_keluarController::class, 'destroy'])->name('admin.surat_keluar.delete');
    Route::post('/surat_keluar/excel/destroy', [Surat_keluarController::class, 'delete_all'])->name('admin.surat_keluar.delete-all');
    Route::get('/export/excel/surat_keluar', [ExcelController::class, 'surat_keluar'])->name('admin.export.surat_keluar');

});

// untuk tu
Route::prefix('admin/tu')->middleware(['web', 'auth', 'role:tu'])->group(function () {
    Route::get('surat_masuk', [Surat_masukController::class, 'index_TU'])->name('surat_masuk.tu.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_TU'])->name('surat_masuk.tu.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_surat'])->name('surat_masuk.tu.detail');
    Route::get('surat_masuk/tambah', [Surat_masukController::class, 'tambah_surat'])->name('surat_masuk.tu.tambah');
    Route::post('surat_masuk/post', [Surat_masukController::class, 'store_surat'])->name('surat_masuk.tu.post');
    Route::get('surat_masuk/edit/{id}', [Surat_masukController::class, 'edit_surat'])->name('surat_masuk.tu.edit');
    Route::put('surat_masuk/update/{id}', [Surat_masukController::class, 'update_surat'])->name('surat_masuk.tu.update');
    Route::delete('surat_masuk/delete/{id}', [Surat_masukController::class, 'destroy_surat'])->name('surat_masuk.tu.delete');
});

// untuk kepsek
Route::prefix('admin/kepsek')->middleware(['web', 'auth', 'role:kepsek'])->group(function () {
    Route::get('surat_masuk', [Surat_masukController::class, 'index_kepsek'])->name('surat_masuk.kepsek.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_kepsek'])->name('surat_masuk.kepsek.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_Kepsek'])->name('surat_masuk.kepsek.detail');

    // disposisi by id
    Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('surat_masuk.kepsek.desposisi.view');
    Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('surat_masuk.kepsek.desposisi.tambah');
    Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('surat_masuk.kepsek.desposisi.edit');

    // table disposisi
    Route::get('disposisi', [DiposisiController::class, 'index'])->name('disposisi.kepsek.index');
    Route::post('disposisi/ajax', [DiposisiController::class, 'ajax'])->name('disposisi.kepsek.ajax');
    Route::get('disposisi/detail/{id}', [DiposisiController::class, 'detail'])->name('disposisi.kepsek.detail');
    Route::get('disposisi/tambah/', [DiposisiController::class, 'tambah'])->name('disposisi.kepsek.tambah');
    Route::patch('disposisi/post/{id}', [DiposisiController::class, 'store'])->name('disposisi.kepsek.post'); // update disposisi
    Route::get('disposisi/edit/{id}', [DiposisiController::class, 'edit'])->name('disposisi.kepsek.edit'); // edit disposisi biasa
    Route::put('disposisi/update/{id}', [DiposisiController::class, 'update'])->name('disposisi.kepsek.update'); // update disposisi
    Route::delete('disposisi/delete/{id}', [DiposisiController::class, 'destroy'])->name('disposisi.kepsek.delete'); // table disposisi

    Route::get('surat_keluar', [Surat_keluarController::class, 'index'])->name('kepsek.surat_keluar.index');
    Route::post('surat_keluar/ajax', [Surat_keluarController::class, 'ajax'])->name('kepsek.surat_keluar.ajax');
    Route::get('surat_keluar/detail/{id}', [Surat_keluarController::class, 'detail'])->name('kepsek.surat_keluar.detail');
    Route::get('surat_keluar/tambah', [Surat_keluarController::class, 'tambah'])->name('kepsek.surat_keluar.tambah');
    Route::post('surat_keluar/post', [Surat_keluarController::class, 'store'])->name('kepsek.surat_keluar.post');
    Route::get('surat_keluar/edit/{id}', [Surat_keluarController::class, 'edit'])->name('kepsek.surat_keluar.edit');
    Route::put('surat_keluar/update/{id}', [Surat_keluarController::class, 'update'])->name('kepsek.surat_keluar.update');
    Route::delete('surat_keluar/delete/{id}', [Surat_keluarController::class, 'destroy'])->name('kepsek.surat_keluar.delete');
    Route::post('/surat_keluar/excel/destroy', [Surat_keluarController::class, 'delete_all'])->name('kepsek.surat_keluar.delete-all');
    Route::get('/export/excel/surat_keluar', [ExcelController::class, 'surat_keluar'])->name('kepsek.export.surat_keluar');
});

// route pokja
// untuk kurikulum
Route::prefix('admin/kurikulum')->middleware(['web', 'auth', 'role:kurikulum'])->group(function () {
    Route::get('surat_masuk', [Surat_masukController::class, 'index_pokja'])->name('surat_masuk.kurikulum.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_pokja'])->name('surat_masuk.kurikulum.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_kurikulum'])->name('surat_masuk.kurikulum.detail');
    Route::get('surat_masuk/download/{id}', [Surat_masukController::class, 'download'])->name('download');

    // disposisi by id
    Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('desposisi.view');
    Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('desposisi.tambah');
    Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('desposisi.edit');

});

// untuk kesiswaan
Route::prefix('admin/kesiswaan')->middleware(['web', 'auth', 'role:kesiswaan'])->group(function () {
    Route::get('surat_masuk', [Surat_masukController::class, 'index_pokja'])->name('surat_masuk.kesiswaan.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_pokja'])->name('surat_masuk.kesiswaan.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_kesiswaan'])->name('surat_masuk.kesiswaan.detail');
    Route::get('surat_masuk/download/{id}', [Surat_masukController::class, 'download'])->name('download');

    // disposisi by id
    Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('desposisi.view');
    Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('desposisi.tambah');
    Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('desposisi.edit');
});

// untuk hubin saja
Route::prefix('admin/hubin')->middleware(['web', 'auth', 'role:hubin'])->group(function () {
    // surat masuk
    Route::get('surat_masuk', [Surat_masukController::class, 'index_pokja'])->name('surat_masuk.hubin.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_pokja'])->name('surat_masuk.hubin.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detai_pokja'])->name('surat_masuk.hubin.detail');
    Route::get('surat_masuk/download/{id}', [Surat_masukController::class, 'download'])->name('download');
        // disposisi by id
    Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('desposisi.view');
    Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('desposisi.tambah');
    Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('desposisi.edit');

    Route::get('surat_keluar', [Surat_keluarController::class, 'index'])->name('hubin.surat_keluar.index');
    Route::post('surat_keluar/ajax', [Surat_keluarController::class, 'ajax'])->name('hubin.surat_keluar.ajax');
    Route::get('surat_keluar/detail/{id}', [Surat_keluarController::class, 'detail'])->name('hubin.surat_keluar.detail');
    Route::get('surat_keluar/tambah', [Surat_keluarController::class, 'tambah'])->name('hubin.surat_keluar.tambah');
    Route::post('surat_keluar/post', [Surat_keluarController::class, 'store'])->name('hubin.surat_keluar.post');
    Route::get('surat_keluar/edit/{id}', [Surat_keluarController::class, 'edit'])->name('hubin.surat_keluar.edit');
    Route::put('surat_keluar/update/{id}', [Surat_keluarController::class, 'update'])->name('hubin.surat_keluar.update');
    Route::delete('surat_keluar/delete/{id}', [Surat_keluarController::class, 'destroy'])->name('hubin.surat_keluar.delete');
    Route::post('/surat_keluar/excel/destroy', [Surat_keluarController::class, 'delete_all'])->name('hubin.surat_keluar.delete-all');
    Route::get('/export/excel/surat_keluar', [ExcelController::class, 'surat_keluar'])->name('hubin.export.surat_keluar');
});

// untuk sarpras
Route::prefix('admin/sarpras')->middleware(['web', 'auth', 'role:sarpras'])->group(function () {
    // surat masuk
    Route::get('surat_masuk', [Surat_masukController::class, 'index_pokja'])->name('surat_masuk.sarpras.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_pokja'])->name('surat_masuk.sarpras.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_pokja'])->name('surat_masuk.sarpras.detail');
    Route::get('surat_masuk/download/{id}', [Surat_masukController::class, 'download'])->name('download');

    // disposisi by id
    Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('desposisi.view');
    Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('desposisi.tambah');
    Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('desposisi.edit');
});




// modul hubin (prakerin)
// untuk hubin, admin disi
// kaprog
Route::prefix('admin')->middleware(['web', 'auth', 'role:kaprog,hubin'])->group(function () {

    // data prakerin
    Route::get('data_prakerin', [data_prakerinController::class, 'index'])->name('data_prakerin.index');
    Route::post('data_prakerin/ajax', [data_prakerinController::class, 'ajax'])->name('data_prakerin.ajax');
    Route::get('data_prakerin/detail/{id}', [data_prakerinController::class, 'detail'])->name('data_prakerin.detail');
    Route::get('data_prakerin/tambah', [data_prakerinController::class, 'tambah'])->name('data_prakerin.tambah');
    Route::post('data_prakerin/tambah/post', [data_prakerinController::class, 'store'])->name('data_prakerin.post');
    Route::get('data_prakerin/edit/{id}', [data_prakerinController::class, 'edit'])->name('data_prakerin.edit');
    Route::put('data_prakerin/update/{data_prakerin}', [data_prakerinController::class, 'update'])->name('data_prakerin.update');
    Route::delete('data_prakerin/delete/{id}', [data_prakerinController::class, 'destroy'])->name('data_prakerin.delete');
    Route::post('/data_prakerin/destroy', [data_prakerinController::class, 'delete_all'])->name('data_prakerin.delete-all');
    Route::get('/export/excel/data_prakerin', [ExcelController::class, 'data_prakerin'])->name('export.data_prakerin');


    // jurnal harian
    Route::get('jurnalH', [jurnal_harianController::class, 'index'])->name('jurnalH.index');
    Route::post('jurnalH/ajax', [jurnal_harianController::class, 'ajax'])->name('jurnalH.ajax');
    Route::get('jurnalH/detail/{id}', [data_prakerinController::class, 'detail'])->name('jurnalH.detail');
    Route::get('jurnalH/tambah', [jurnal_harianController::class, 'tambah'])->name('jurnalH.tambah');
    Route::post('jurnalH/tambah/post', [jurnal_harianController::class, 'store'])->name('jurnalH.post');
    Route::get('jurnalH/edit/{id}', [jurnal_harianController::class, 'edit'])->name('jurnalH.edit');
    Route::put('jurnalH/update/{id}', [jurnal_harianController::class, 'update'])->name('jurnalH.update');
    Route::delete('jurnalH/delete/{id}', [jurnal_harianController::class, 'destroy'])->name('jurnalH.delete');
    Route::post('/jurnalH/destroy', [jurnal_harianController::class, 'delete_all'])->name('jurnalH.delete-all');
    Route::get('/export/excel/jurnalH', [ExcelController::class, 'jurnalh'])->name('export.jurnalH');

    // jurnal prakerin
    Route::get('jurnal', [jurnal_prakerinController::class, 'index'])->name('jurnal.index');
    Route::post('jurnal/ajax', [jurnal_prakerinController::class, 'ajax'])->name('jurnal.ajax');
    Route::get('jurnal/detail/{id}', [jurnal_prakerinController::class, 'detail'])->name('perusahaan.detail');
    Route::get('jurnal/tambah', [jurnal_prakerinController::class, 'tambah'])->name('jurnal.tambah');
    Route::post('jurnal/tambah/post', [jurnal_prakerinController::class, 'store'])->name('jurnal.post');
    Route::get('jurnal/edit/{id}', [jurnal_prakerinController::class, 'edit'])->name('jurnal.edit');
    Route::put('jurnal/update/{jurnal_prakerin}', [jurnal_prakerinController::class, 'update'])->name('jurnal.update');
    Route::delete('jurnal/delete/{id}', [jurnal_prakerinController::class, 'destroy'])->name('jurnal.delete');
    Route::post('/jurnal/destroy', [jurnal_prakerinController::class, 'delete_all'])->name('jurnal.delete-all');
    Route::get('/export/excel/jurnal', [ExcelController::class, 'jurnalh'])->name('export.jurnal');

    // kelompok magang
    Route::get('kelompok', [kelompokController::class, 'index'])->name('kelompok.index');
    Route::get('kelompok/ajax', [kelompokController::class, 'ajax'])->name('kelompok.ajax');
    Route::get('kelompok/detail/{id}', [kelompokController::class, 'detail'])->name('kelompok.detail');
    Route::get('kelompok/tambah', [kelompokController::class, 'tambah'])->name('kelompok.tambah');
    Route::post('kelompok/tambah/post', [kelompokController::class, 'store'])->name('kelompok.post');
    Route::get('kelompok/edit/{id}', [kelompokController::class, 'edit'])->name('kelompok.edit');
    Route::put('kelompok/update/{kelompok}', [kelompokController::class, 'update'])->name('kelompok.update');
    Route::delete('kelompok/delete/{id}', [kelompokController::class, 'destroy'])->name('kelompok.delete');
    Route::post('kelompok/ajax', [kelompokController::class, 'ajax'])->name('kelompok.ajax');
    Route::delete('/kelompok/destroy_all/{id}', [kelompokController::class, 'delete_all'])->name('kelompok.delete-all');
    // Route::get('/export/excel/kelompok', [ExcelController::class, 'kelompok']);
    Route::post('/export/pdf/kelompok/{id}/{nomor}', [PDFController::class, 'kelompokPrakerin'])->name('export.kelompok');
    Route::get('/export/pdf/contoh', [PDFController::class, 'contoh'])->name('export.contoh');

    // laporan magang
    Route::get('laporan', [laporanController::class, 'index'])->name('laporan.index');
    Route::post('laporan/ajax', [laporanController::class, 'ajax'])->name('laporan.ajax');
    Route::get('laporan/detail/{id}', [laporanController::class, 'detail'])->name('laporan.detail');
    Route::get('laporan/tambah', [laporanController::class, 'tambah'])->name('laporan.tambah');
    Route::post('laporan/tambah/post', [laporanController::class, 'store'])->name('laporan.post');
    Route::get('laporan/edit', [laporanController::class, 'edit'])->name('laporan.edit');
    Route::put('laporan/update', [laporanController::class, 'update'])->name('laporan.update');
    Route::delete('laporan/delete/{id}', [perusahaanController::class, 'destroy'])->name('laporan.delete');
    Route::post('/laporan/destroy', [laporanController::class, 'delete_all'])->name('laporan.delete-all');
    Route::get('/export/excel/laporan', [ExcelController::class, 'perusahaan'])->name('export.laporan');

    // data perusahaan
    Route::get('perusahaan', [perusahaanController::class, 'index'])->name('perusahaan.index');
    Route::post('perusahaan/ajax', [perusahaanController::class, 'ajax'])->name('perusahaan.ajax');
    Route::get('perusahaan/detail/{id}', [perusahaanController::class, 'detail'])->name('perusahaan.detail');
    Route::get('perusahaan/tambah', [perusahaanController::class, 'tambah'])->name('perusahaan.tambah');
    Route::post('perusahaan/tambah/post', [perusahaanController::class, 'store'])->name('perusahaan.post');
    Route::get('perusahaan/edit/{id}', [perusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('perusahaan/update/{id}', [perusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('perusahaan/delete/{id}', [perusahaanController::class, 'destroy'])->name('perusahaan.delete');
    Route::post('/perusahaan/destroy', [perusahaanController::class, 'delete_all'])->name('perusahaan.delete-all');
    Route::get('/export/excel/perusahaan', [ExcelController::class, 'perusahaan'])->name('export.perusahaan');
    Route::get('/export/pdf/perusahaan', [PDFController::class, 'perusahaan']);
});

// bkk
Route::prefix('admin')->middleware(['web', 'auth', 'role:bkk,hubin'])->group(function () {
    // pembekalan
    Route::get('pembekalan', [pembekalanContoller::class, 'index'])->name('pembekalan.index');
    Route::post('pembekalan/ajax', [pembekalanContoller::class, 'ajax'])->name('pembekalan.ajax');
    Route::get('pembekalan/detail/{id}', [pembekalanContoller::class, 'detail'])->name('pembekalan.detail');
    Route::get('pembekalan/tambah', [pembekalanContoller::class, 'tambah'])->name('pembekalan.tambah');
    Route::post('pembekalan/tambah/post', [pembekalanContoller::class, 'store'])->name('pembekalan.post');
    Route::get('pembekalan/edit/{id}', [pembekalanContoller::class, 'edit'])->name('pembekalan.edit');
    Route::put('pembekalan/update/{pembekalan}', [pembekalanContoller::class, 'update'])->name('pembekalan.update');
    Route::delete('pembekalan/delete/{id}', [pembekalanContoller::class, 'destroy'])->name('pembekalan.delete');
    Route::post('/pembekalan/destroy', [pembekalanContoller::class, 'delete_all'])->name('pembekalan.delete-all');
    Route::get('/export/excel/pembekalan', [pembekalanContoller::class, 'pembekalan'])->name('export.pembekalan');
    Route::get('/pembekalan/{id}/download', [pembekalanContoller::class, 'downloads'])->name('pembekalan.download');
});




// untuk siswa/user di sini
Route::middleware(['web', 'auth', 'role:siswa'])->group(function () {

    // memakai route view untuk view saja
    Route::get('/user/dashboard', [userController::class, 'index'])->name('index.user'); //dashboard
    Route::get('/user/status', [userController::class, 'status'])->name('user.status');

    //profile
    Route::get('/user/profile', [userController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/edit', [userController::class, 'profile_edit'])->name('user.edit.profile');
    Route::put('/user/profile/{id}', [userController::class, 'profile_update'])->name('user.update.profile');

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
