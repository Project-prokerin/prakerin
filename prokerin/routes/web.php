<?php
use App\Http\Controllers\viewController;
use App\Http\Controllers\auth\AuthController; //auth
use Illuminate\Support\Facades\Route;

//admin route
use App\Http\Controllers\admin\siswa\siswaController;
use App\Http\Controllers\admin\guru\guruController;
use App\Http\Controllers\admin\perusahaan\perusahaanController;
use App\Http\Controllers\admin\data_prakerin\data_prakerinController;
use App\Http\Controllers\admin\data_prakerin\KategoriController;
use App\Http\Controllers\admin\data_prakerin\pengajuan_prakerinController;
use App\Http\Controllers\admin\pembekalan\pembekalanContoller;
use App\Http\Controllers\admin\jurnal\jurnal_harianController;
use App\Http\Controllers\admin\jurnal\jurnal_prakerinController;
use App\Http\Controllers\admin\jurusan\jurusanController;
use App\Http\Controllers\admin\kelompok\kelompokController;
use App\Http\Controllers\admin\laporan\laporanController;
use App\Http\Controllers\admin\kelas\kelasController;
use App\Http\Controllers\admin\surat_masuk\Surat_masukController;
use App\Http\Controllers\admin\surat_masuk\DiposisiController;
use App\Http\Controllers\admin\surat_keluar\Surat_keluarController;
use App\Http\Controllers\admin\tandatangan\TandatanganController;
use App\Http\Controllers\admin\penelusuran_tamantan\Penelusuran_tamatanController;
use App\Http\Controllers\admin\data_prakerin\Nilai_PrakerinController;
use App\Http\Controllers\admin\penelusuran_tamatan\Penelusuran_tamatanController as Penelusuran_tamatanPenelusuran_tamatanController;
use App\Http\Controllers\admin\siswa\alumniController;

use App\Http\Controllers\admin\Notif\NotificationController;

// user routeus
// ex App\Http\Controllers\user\namaController;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\user\SiswaNilai_PrakerinController;

// for pakage only
use App\Http\Controllers\PDF\PDFController;
use App\Http\Controllers\Excel\ExportExcelController as ExcelController;
use App\Http\Controllers\Excel\ImportExcelController;

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

header('Access-Control-Allow-Origin: http://localhost:8000');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');


// Auth
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/time', [AuthController::class,'time_log'])->name('time_log');

// route post api here
Route::get('/api/prakerin/{token}',[AuthController::class,'token'])->name('api-token')->middleware('sitakols_cookies');
    

// all admin
Route::middleware(['web', 'auth', 'role:bkk,hubin,kaprog,kepsek,tu,kurikulum,kesiswaan,litbang,admin,sarpras,pembimbing'])->group(function () {

    Route::get('/admin/dashboard',  [ViewController::class, 'dashboard'])->name('admin.dashboard');  // memakai route
    Route::post('/admin/dashboard/ajax',  [ViewController::class, 'ajax'])->name('dashboard.ajax');  // memakai route view untuk view saja
    // Route::get('/export/excel/siswa', [ExcelController::class, 'siswa'])->name('export.siswa');
});

// export surat keluar
Route::prefix('admin')->middleware(['web', 'auth', 'role:admin,kepsek,tu'])->group(function () {
    Route::get('surat_masuk/export/excel', [ExcelController::class, 'surat_m'])->name('admin.surat_masuk.excel');
    Route::get('disposisi/export/excel', [ExcelController::class, 'disposisi'])->name('admin.disposisi.excel');
});

Route::prefix('admin')->middleware(['web', 'auth', 'role:admin,kepsek,tu,kaprog,kurikulum,kesiswaan,hubin,sarpras,bkk'])->group(function () {
    // data surat
    Route::get('surat_masuk', [Surat_masukController::class, 'index_admin'])->name('admin.surat_masuk.index');
    Route::post('surat_masuk/ajax', [Surat_masukController::class, 'ajax_admin'])->name('admin.surat_masuk.ajax');
    Route::get('surat_masuk/detail/{id}', [Surat_masukController::class, 'detail_surat'])->name('admin.surat_masuk.detail');
    Route::get('surat_masuk/tambah', [Surat_masukController::class, 'tambah_surat'])->name('admin.surat_masuk.tambah');
    Route::post('surat_masuk/post', [Surat_masukController::class, 'store_surat'])->name('admin.surat_masuk.post');
    Route::get('surat_masuk/edit/{id}', [Surat_masukController::class, 'edit_surat'])->name('admin.surat_masuk.edit');
    Route::put('surat_masuk/update/{id}', [Surat_masukController::class, 'update_surat'])->name('admin.surat_masuk.update');
    Route::delete('surat_masuk/delete/{id}', [Surat_masukController::class, 'destroy_surat'])->name('admin.surat_masuk.delete');
    Route::delete('surat_masuk/batal/{id}', [Surat_masukController::class, 'batal'])->name('admin.surat_masuk.batal');
    Route::get('surat_masuk/download/{id}', [Surat_masukController::class, 'download'])->name('admin.surat_masuk.download');


    // disposisi table surat
    Route::middleware(['web', 'auth', 'role:kesiswaan,hubin,kurikulum,admin,kepsek,tu,kaprog'])->group(function () {
        Route::get('surat_masuk/{id}/disposisi/view', [DiposisiController::class, 'detail'])->name('desposisi.view');
        Route::get('surat_masuk/{id}/disposisi/tambah/', [DiposisiController::class, 'tambah_disposisi'])->name('desposisi.tambah');
        Route::get('surat_masuk/{id}/disposisi/edit', [DiposisiController::class, 'edit'])->name('desposisi.edit');

        Route::post('surat_masuk/feedback/store', [DiposisiController::class, 'feedback_store'])->name('disposisi.feedback.store');
        // Route::patch('surat_masuk/{id}/feedback/edit', [DiposisiController::class, 'feedback_edit'])->name('disposisi.feedback.edit');
        Route::put('surat_masuk/{id}/feedback/update', [DiposisiController::class, 'feedback_update'])->name('disposisi.feedback.update');

        // table disposisi
        Route::get('disposisi', [DiposisiController::class, 'index'])->name('admin.disposisi.index');
        Route::post('disposisi/ajax', [DiposisiController::class, 'ajax'])->name('admin.disposisi.ajax');
        // Route::get('disposisi/detail/{id}', [DiposisiController::class, 'detail'])->name('disposisi.admin.detail');
        Route::get('disposisi/tambah/', [DiposisiController::class, 'tambah2'])->name('admin.disposisi.tambah');
        Route::patch('disposisi/post/{id}', [DiposisiController::class, 'store'])->name('admin.disposisi.patch'); // update
        Route::post('disposisi/post/', [DiposisiController::class, 'store2'])->name('admin.disposisi.post'); // update disposisi
        Route::get('disposisi/edit/{id}', [DiposisiController::class, 'edit'])->name('admin.disposisi.edit'); // edit disposisi biasa
        Route::put('disposisi/update/{id}', [DiposisiController::class, 'update'])->name('admin.disposisi.update'); // update disposisi
        Route::delete('disposisi/delete/{id}', [DiposisiController::class, 'destroy'])->name('admin.disposisi.delete'); // table disposisi


        Route::post('/Notification/ajax', [NotificationController::class, 'ajax'])->name('notification.ajax');
        Route::post('/Notification/mark', [NotificationController::class, 'markNotification'])->name('markNotification.mark');


    });

    Route::middleware(['web', 'auth', 'role:admin,kepsek,kaprog,hubin,tu,bkk'])->group(function () {
        Route::get('surat_keluar', [Surat_keluarController::class, 'index'])->name('admin.surat_keluar.index');
        Route::get('surat_keluar/ajax', [Surat_keluarController::class, 'ajax'])->name('admin.surat_keluar.ajax');
        Route::get('surat_keluar/detail/{id}', [Surat_keluarController::class, 'detail'])->name('admin.surat_keluar.detail');
        Route::get('surat_keluar/tambah', [Surat_keluarController::class, 'tambah'])->name('admin.surat_keluar.tambah');
        Route::get('surat_keluar/download/{id}', [Surat_keluarController::class, 'suratKdownload'])->name('admin.surat_keluar.download');
        Route::get('surat_keluar/stream/{id}', [Surat_keluarController::class, 'suratKstream'])->name('admin.surat_keluar.stream');
        Route::post('surat_keluar/post', [Surat_keluarController::class, 'store'])->name('admin.surat_keluar.post');
        Route::get('surat_keluar/edit/{id}', [Surat_keluarController::class, 'edit'])->name('admin.surat_keluar.edit');
        Route::put('surat_keluar/update/{id}', [Surat_keluarController::class, 'update'])->name('admin.surat_keluar.update');
        Route::delete('surat_keluar/delete/{id}', [Surat_keluarController::class, 'destroy'])->name('admin.surat_keluar.delete');
        Route::post('/surat_keluar/excel/destroy', [Surat_keluarController::class, 'delete_all'])->name('admin.surat_keluar.delete-all');
        Route::get('/export/excel/surat_keluar', [ExcelController::class, 'surat_keluar'])->name('admin.export.surat_keluar');
        Route::put('surat_keluar/tolak/{id}', [Surat_keluarController::class, 'tolak'])->name('admin.surat_keluar.tolak');
        Route::get('surat_keluar/tandatangan/{id}', [Surat_keluarController::class, 'tandatangan'])->name('admin.surat_keluar.tandatangan');
        Route::put('surat_keluar/setujui/{id}', [Surat_keluarController::class, 'setujui'])->name('admin.surat_keluar.setujui');
        Route::get('/export/pdf/contssssoh', [PDFController::class, 'contohh'])->name('export.contohh');
    });

});

// route admin (data master ..ect)
Route::prefix('admin')->middleware(['web', 'auth', 'role:admin'])->group(function () {
    // data siswa
    Route::get('siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::get('siswa/ajax', [siswaController::class, 'ajax'])->name('siswa.ajax');
    Route::get('siswa/detail/{id}', [siswaController::class, 'detail'])->name('siswa.detail');
    Route::get('siswa/tambah', [siswaController::class, 'tambah'])->name('siswa.tambah');
    Route::post('siswa/post', [siswaController::class, 'store'])->name('siswa.post');
    Route::get('siswa/edit/{id}', [siswaController::class, 'edit'])->name('siswa.edit');
    Route::put('siswa/update/{id}', [siswaController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/delete/{id}',[siswaController::class, 'destroy'])->name('siswa.delete');
    Route::post('/siswa/excel/destroy', [siswaController::class, 'delete_all'])->name('siswa.delete-all');
    Route::get('/export/excel/siswa', [ExcelController::class, 'siswa'])->name('export.siswa');
    Route::get('/template/siswa/excel', [SiswaController::class,'template_excel'])->name('template.excel.siswa');
    Route::post('/import/excel/siswa',[ImportExcelController::class,'siswa'])->name('import.siswa');

    // data guru
    Route::get('guru', [guruController::class, 'index'])->name('guru.index');
    Route::get('guru/ajax', [guruController::class, 'ajax'])->name('guru.ajax');
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
    Route::get('kelas/ajax', [kelasController::class, 'ajax'])->name('kelas.ajax');
    Route::get('kelas/detail/{id}', [kelasController::class, 'detail'])->name('kelas.detail');
    Route::get('kelas/tambah', [kelasController::class, 'tambah'])->name('kelas.tambah');
    Route::post('kelas/tambah/post', [kelasController::class, 'store'])->name('kelas.post');
    Route::get('kelas/edit/{id}', [kelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/update/{id}', [kelasController::class, 'update'])->name('kelas.update');
    Route::delete('kelas/delete/{id}', [kelasController::class, 'destroy'])->name('kelas.delete');
    Route::post('/kelas/destroy', [kelasController::class, 'delete_all'])->name('kelas.delete-all');
    Route::get('/export/excel/kelas', [ExcelController::class, 'kelas'])->name('export.kelas');

    // data jurusan
    Route::get('jurusan', [jurusanController::class, 'index'])->name('jurusan.index');
    Route::get('jurusan/ajax', [jurusanController::class, 'ajax'])->name('jurusan.ajax');
    Route::get('jurusan/detail/{id}', [jurusanController::class, 'detail'])->name('jurusan.detail');
    Route::get('jurusan/tambah', [jurusanController::class, 'tambah'])->name('jurusan.tambah');
    Route::post('jurusan/tambah/post', [jurusanController::class, 'store'])->name('jurusan.post');
    Route::get('jurusan/edit/{id}', [jurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('jurusan/update/{id}', [jurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('jurusan/delete/{id}', [jurusanController::class, 'destroy'])->name('jurusan.delete');
    Route::post('/jurusan/destroy', [jurusanController::class, 'delete_all'])->name('jurusan.delete-all');
    Route::get('/export/excel/jurusan', [ExcelController::class, 'jurusan'])->name('export.jurusan');


    Route::get('tanda-tangan', [TandatanganController::class, 'index'])->name('tanda-tangan.index');
    Route::get('tanda-tangan/detail/{id}', [TandatanganController::class, 'detail'])->name('tanda-tangan.detail');
    Route::get('tanda-tangan/tambah', [TandatanganController::class, 'tambah'])->name('tanda-tangan.tambah');
    Route::post('tanda-tangan/tambah/post', [TandatanganController::class, 'store'])->name('tanda-tangan.post');
    Route::get('tanda-tangan/edit/{id}', [TandatanganController::class, 'edit'])->name('tanda-tangan.edit');
    Route::put('tanda-tangan/update/{id}', [TandatanganController::class, 'update'])->name('tanda-tangan.update');
    Route::delete('tanda-tangan/delete/{id}', [TandatanganController::class, 'destroy'])->name('tanda-tangan.delete');
    Route::post('/tanda-tangan/destroy', [TandatanganController::class, 'delete_all'])->name('tanda-tangan.delete-all');
    Route::get('/export/excel/tanda-tangan', [ExcelController::class, 'guru'])->name('export.tanda-tangan');


});




// modul hubin (prakerin)
// untuk hubin, admin disi
// kaprog
Route::prefix('admin')->middleware(['web', 'auth', 'role:kaprog,hubin,admin,kepsek,pembimbing,tu,siswa,bkk'])->group(function () {
    Route::middleware(['web', 'auth', 'role:kaprog,hubin,admin,kepsek,pembimbing,tu,siswa,bkk'])->group(function () {
    // data prakerin
    Route::get('data_prakerin', [data_prakerinController::class, 'index'])->name('data_prakerin.index');
    Route::get('data_prakerin/ajax', [data_prakerinController::class, 'ajax'])->name('data_prakerin.ajax');
    Route::get('data_prakerin/detail/{id}', [data_prakerinController::class, 'detail'])->name('data_prakerin.detail');
    Route::get('data_prakerin/tambah', [data_prakerinController::class, 'tambah'])->name('data_prakerin.tambah');
    Route::post('data_prakerin/tambah/post', [data_prakerinController::class, 'store'])->name('data_prakerin.post');
    Route::get('data_prakerin/edit/{id}', [data_prakerinController::class, 'edit'])->name('data_prakerin.edit');
    Route::put('data_prakerin/update/{data_prakerin}', [data_prakerinController::class, 'update'])->name('data_prakerin.update');
    Route::delete('data_prakerin/delete/{id}', [data_prakerinController::class, 'destroy'])->name('data_prakerin.delete');
    Route::post('/data_prakerin/destroy', [data_prakerinController::class, 'delete_all'])->name('data_prakerin.delete-all');
    Route::get('/export/excel/data_prakerin', [ExcelController::class, 'data_prakerin'])->name('export.data_prakerin');
    Route::get('/export/excel/admin/data_prakerin', [ExcelController::class, 'admin_data_prakerin'])->name('export.admin.data_prakerin');

    // jurnal harian
    Route::get('jurnalH', [jurnal_harianController::class, 'index'])->name('jurnalH.index');
    Route::get('jurnalH/ajax', [jurnal_harianController::class, 'ajax'])->name('jurnalH.ajax');
    Route::get('jurnalH/detail/{id}', [jurnal_harianController::class, 'detail'])->name('jurnalH.detail');
    Route::get('jurnalH/tambah', [jurnal_harianController::class, 'tambah'])->name('jurnalH.tambah');
    Route::post('jurnalH/tambah/post', [jurnal_harianController::class, 'store'])->name('jurnalH.post');
    Route::get('jurnalH/edit/{id}', [jurnal_harianController::class, 'edit'])->name('jurnalH.edit');
    Route::put('jurnalH/update/{id}', [jurnal_harianController::class, 'update'])->name('jurnalH.update');
    Route::delete('jurnalH/delete/{id}', [jurnal_harianController::class, 'destroy'])->name('jurnalH.delete');
    Route::post('/jurnalH/destroy', [jurnal_harianController::class, 'delete_all'])->name('jurnalH.delete-all');
    Route::get('/export/excel/jurnalH', [ExcelController::class, 'jurnalh'])->name('export.jurnalH');

    // jurnal prakerin
    Route::get('jurnal', [jurnal_prakerinController::class, 'index'])->name('jurnal.index');
    Route::get('jurnal/ajax', [jurnal_prakerinController::class, 'ajax'])->name('jurnal.ajax');
    Route::get('jurnal/detail/{id}', [jurnal_prakerinController::class, 'detail'])->name('jurnal.detail');
    Route::get('jurnal/tambah', [jurnal_prakerinController::class, 'tambah'])->name('jurnal.tambah');
    Route::post('jurnal/tambah/post', [jurnal_prakerinController::class, 'store'])->name('jurnal.post');
    Route::get('jurnal/edit/{id}', [jurnal_prakerinController::class, 'edit'])->name('jurnal.edit');
    Route::put('jurnal/update/{jurnal_prakerin}', [jurnal_prakerinController::class, 'update'])->name('jurnal.update');
    Route::delete('jurnal/delete/{id}', [jurnal_prakerinController::class, 'destroy'])->name('jurnal.delete');
    Route::post('/jurnal/destroy', [jurnal_prakerinController::class, 'delete_all'])->name('jurnal.delete-all');
    Route::get('/export/excel/jurnal', [ExcelController::class, 'jurnalp'])->name('export.jurnal');

    // pengajuan magang
    Route::get('pengajuan_prakerin', [pengajuan_prakerinController::class, 'index'])->name('pengajuan_prakerin.index');
    Route::get('pengajuan_prakerin/ajax', [pengajuan_prakerinController::class, 'ajax'])->name('pengajuan_prakerin.ajax');
    Route::get('pengajuan_prakerin/detail/{id}', [pengajuan_prakerinController::class, 'detail'])->name('pengajuan_prakerin.detail');
    Route::get('pengajuan_prakerin/tambah', [pengajuan_prakerinController::class, 'tambah'])->name('pengajuan_prakerin.tambah');
    Route::get('pengajuan_prakerin/fetch/{id}', [pengajuan_prakerinController::class, 'fetch'])->name('pengajuan_prakerin.fetch');
    Route::get('pengajuan_prakerin/fetch_edit/{id}', [pengajuan_prakerinController::class, 'fetch_edit'])->name('pengajuan_prakerin.fetch_edit');
    Route::post('pengajuan_prakerin/tambah/post', [pengajuan_prakerinController::class, 'store'])->name('pengajuan_prakerin.post');

    Route::get('pengajuan_prakerin/acc/{no}', [pengajuan_prakerinController::class, 'acc'])->name('pengajuan_prakerin.acc');
    Route::put('pengajuan_prakerin/accmagang/{no}', [pengajuan_prakerinController::class, 'accmagang'])->name('pengajuan_prakerin.accmagang');
    Route::get('pengajuan_prakerin/Showexport/{no}', [pengajuan_prakerinController::class, 'pengajuanShowexport'])->name('pengajuan_prakerin.Showexport');
    Route::post('/export/pdf/pengajuan_prakerin/export/{no}', [PDFController::class, 'pengajuan_prakerin'])->name('export.kelompokPengajuan');
    // Route::post('/export/pdf/pengajuan_prakerin/{id}/{nomor}',[PDFController::class, 'pengajuan_prakerin'])->name('export.kelompok');

  Route::post('pengajuan_prakerin/tolak/{no}', [pengajuan_prakerinController::class, 'tolak'])->name('pengajuan_prakerin.tolak');
    Route::get('pengajuan_prakerin/edit/{id}', [pengajuan_prakerinController::class, 'edit'])->name('pengajuan_prakerin.edit');
    Route::put('pengajuan_prakerin/update/{pengajuan_prakerin}', [pengajuan_prakerinController::class, 'update'])->name('pengajuan_prakerin.update');
    Route::delete('pengajuan_prakerin/delete/{id}', [pengajuan_prakerinController::class, 'destroy'])->name('pengajuan_prakerin.delete');
    Route::post('pengajuan_prakerin/ajax', [pengajuan_prakerinController::class, 'ajax'])->name('pengajuan_prakerin.ajax');
    Route::delete('/pengajuan_prakerin/destroy/{id}', [pengajuan_prakerinController::class, 'destroy'])->name('pengajuan_prakerin.delete-all');
    // Route::post('/export/pdf/pengajuan_prakerin/{id}/{nomor}',[PDFController::class, 'pengajuan_prakerin'])->name('export.kelompok');
    Route::get('/export/pdf/contoh', [PDFController::class, 'contoh'])->name('export.contoh');

    // kelompok magang
    Route::get('kelompok',
        [kelompokController::class, 'index']
    )->name('kelompok.index');
    Route::get('kelompok/ajax', [kelompokController::class, 'ajax'])->name('kelompok.ajax');
    Route::get('kelompok/detail/{id}', [kelompokController::class, 'detail'])->name('kelompok.detail');
    Route::get('kelompok/tambah', [kelompokController::class, 'tambah'])->name('kelompok.tambah');
    Route::get('kelompok/fetch/{id}', [kelompokController::class, 'fetch'])->name('kelompok.fetch');
    Route::get('kelompok/fetch_edit/{id}', [kelompokController::class, 'fetch_edit'])->name('kelompok.fetch_edit');
    Route::post('kelompok/tambah/post', [kelompokController::class, 'store'])->name('kelompok.post');
    Route::get('kelompok/edit/{id}', [kelompokController::class, 'edit'])->name('kelompok.edit');
    Route::put('kelompok/update/{kelompok}', [kelompokController::class, 'update'])->name('kelompok.update');
    Route::delete('kelompok/delete/{id}', [kelompokController::class, 'destroy'])->name('kelompok.delete');
    Route::post('kelompok/ajax', [kelompokController::class, 'ajax'])->name('kelompok.ajax');
    Route::delete('/kelompok/destroy_all/{id}', [kelompokController::class, 'delete_all'])->name('kelompok.delete-all');
    Route::get('/export/excel/kelompok', [ExcelController::class, 'kelompok']);
    // Route::post('/export/pdf/kelompok/{id}/{nomor}', [PDFController::class, 'kelompokPrakerin'])->name('export.kelompok');
    Route::get('/export/pdf/contoh', [PDFController::class, 'contoh'])->name('export.contoh');


    // laporan magang
    Route::get('laporan', [laporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/ajax', [laporanController::class, 'ajax'])->name('laporan.ajax');
    Route::get('laporan/detail/{id}', [laporanController::class, 'detail'])->name('laporan.detail');
    Route::get('laporan/tambah', [laporanController::class, 'tambah'])->name('laporan.tambah');
    Route::post('laporan/tambah/post', [laporanController::class, 'store'])->name('laporan.post');
    Route::get('laporan/edit/{id}', [laporanController::class, 'edit'])->name('laporan.edit');
    Route::put('laporan/update/{id}', [laporanController::class, 'update'])->name('laporan.update');
    Route::delete('laporan/delete/{id}', [laporanController::class, 'destroy'])->name('laporan.delete');
    Route::post('/laporan/destroy', [laporanController::class, 'delete_all'])->name('laporan.delete-all');
    Route::get('/export/excel/laporan', [ExcelController::class, 'perusahaan'])->name('export.laporan');

    // data perusahaan
    Route::get('perusahaan', [perusahaanController::class, 'index'])->name('perusahaan.index');
    Route::get('perusahaan/ajax', [perusahaanController::class, 'ajax'])->name('perusahaan.ajax');
    Route::get('perusahaan/detail/{id}', [perusahaanController::class, 'detail'])->name('perusahaan.detail');
    Route::get('perusahaan/tambah', [perusahaanController::class, 'tambah'])->name('perusahaan.tambah');
    Route::post('perusahaan/tambah/post', [perusahaanController::class, 'store'])->name('perusahaan.post');
    Route::get('perusahaan/edit/{id}', [perusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('perusahaan/update/{id}', [perusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('perusahaan/delete/{id}', [perusahaanController::class, 'destroy'])->name('perusahaan.delete');
    Route::post('/perusahaan/destroy', [perusahaanController::class, 'delete_all'])->name('perusahaan.delete-all');
    Route::get('/export/excel/perusahaan', [ExcelController::class, 'perusahaan'])->name('export.perusahaan');
    Route::get('/export/pdf/perusahaan', [PDFController::class, 'perusahaan']);
    Route::get('/template/perusahaan/excel', [perusahaanController::class,'template_excel'])->name('template.excel.perusahaan');
    Route::post('/import/excel/perusahaan',[ImportExcelController::class,'perusahaan'])->name('import.perusahaan');


    });
Route::middleware(['web', 'auth', 'role:kaprog,hubin,admin,kepsek,tu,bkk'])->group(function () {
    // pengajuan magang
    Route::get('pengajuan_prakerin', [pengajuan_prakerinController::class, 'index'])->name('pengajuan_prakerin.index');
    Route::get('pengajuan_prakerin/ajax', [pengajuan_prakerinController::class, 'ajax'])->name('pengajuan_prakerin.ajax');
    Route::get('pengajuan_prakerin/detail/{id}', [pengajuan_prakerinController::class, 'detail'])->name('pengajuan_prakerin.detail');
    Route::get('pengajuan_prakerin/tambah', [pengajuan_prakerinController::class, 'tambah'])->name('pengajuan_prakerin.tambah');
    Route::get('pengajuan_prakerin/fetch/{id}', [pengajuan_prakerinController::class, 'fetch'])->name('pengajuan_prakerin.fetch');
    Route::get('pengajuan_prakerin/fetch_edit/{id}', [pengajuan_prakerinController::class, 'fetch_edit'])->name('pengajuan_prakerin.fetch_edit');
    Route::post('pengajuan_prakerin/tambah/post', [pengajuan_prakerinController::class, 'store'])->name('pengajuan_prakerin.post');
    Route::get('pengajuan_prakerin/edit/{id}', [pengajuan_prakerinController::class, 'edit'])->name('pengajuan_prakerin.edit');
    Route::put('pengajuan_prakerin/update/{pengajuan_prakerin}', [pengajuan_prakerinController::class, 'update'])->name('pengajuan_prakerin.update');
    Route::delete('pengajuan_prakerin/delete/{id}', [pengajuan_prakerinController::class, 'destroy'])->name('pengajuan_prakerin.delete');
    Route::post('pengajuan_prakerin/ajax', [pengajuan_prakerinController::class, 'ajax'])->name('pengajuan_prakerin.ajax');
    Route::delete('/pengajuan_prakerin/destroy/{id}', [pengajuan_prakerinController::class, 'destroy'])->name('pengajuan_prakerin.delete-all');
    Route::post('/export/pdf/kelompok/{id}/{nomor}', [PDFController::class, 'pengajuan_prakerin'])->name('export.kelompok');
    Route::get('/export/pdf/contoh', [PDFController::class, 'contoh'])->name('export.contoh');
});


});

// bkk                                                               #disini
Route::prefix('admin')->middleware(['web', 'auth', 'role:bkk,hubin,admin,kurikulum,tu,kaprog,kepsek,siswa,pembimbing'])->group(function () {
    Route::middleware('role:bkk,hubin,admin,kepsek,pembimbing,tu')->group(function () {
        Route::get('pembekalan', [pembekalanContoller::class, 'index'])->name('pembekalan.index');
        Route::get('pembekalan/ajax', [pembekalanContoller::class, 'ajax'])->name('pembekalan.ajax');
        Route::get('pembekalan/detail/{id}', [pembekalanContoller::class, 'detail'])->name('pembekalan.detail');
        Route::get('pembekalan/tambah', [pembekalanContoller::class, 'tambah'])->name('pembekalan.tambah');
        Route::post('pembekalan/tambah/post', [pembekalanContoller::class, 'store'])->name('pembekalan.post');
        Route::get('pembekalan/edit/{id}', [pembekalanContoller::class, 'edit'])->name('pembekalan.edit');
        Route::put('pembekalan/update/{pembekalan}', [pembekalanContoller::class, 'update'])->name('pembekalan.update');
        Route::delete('pembekalan/delete/{id}', [pembekalanContoller::class, 'destroy'])->name('pembekalan.delete');
        Route::post('/pembekalan/destroy', [pembekalanContoller::class, 'delete_all'])->name('pembekalan.delete-all');
        Route::get('/export/excel/pembekalan', [ExcelController::class, 'pembekalan'])->name('export.pembekalan');
        Route::get('/pembekalan/{name}/download', [pembekalanContoller::class, 'downloads'])->name('pembekalan.download');
    });

    // penelusuran tamatan
    Route::middleware('role:bkk,hubin,admin,kurikulum,tu')->group(function () {
        Route::get('penelusuran_tamantan', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'index'])->name('penelusuran_tamantan.index');
        Route::get('penelusuran_tamantan/ajax', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'ajax'])->name('penelusuran_tamantan.ajax');
        Route::get('penelusuran_tamatan/detail/{id}', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'show'])->name('penelusuran_tamantan.detail');
        Route::get('penelusuran_tamantan/tambah', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'tambah'])->name('penelusuran_tamantan.tambah');
        Route::post('penelusuran_tamantan/tambah/post', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'store'])->name('penelusuran_tamantan.post');
        Route::get('penelusuran_tamantan/edit/{id}', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'edit'])->name('penelusuran_tamantan.edit');
        Route::put('penelusuran_tamantan/update/{penelusuran_tamantan}', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'update'])->name('penelusuran_tamantan.update');
        Route::delete('penelusuran_tamantan/delete/{id}', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'destroy'])->name('penelusuran_tamantan.delete');
        Route::post('/penelusuran_tamantan/destroy', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'delete_all'])->name('penelusuran_tamantan.delete-all');
        Route::get('/export/excel/penelusuran_tamantan', [ExcelController::class, 'penelusuran_tamantan'])->name('export.penelusuran_tamantan');
        Route::get('/penelusuran_tamantan/{name}/download', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'downloads'])->name('penelusuran_tamantan.download');

        // option
        Route::get('fetch/alumni/{id}', [Penelusuran_tamatanPenelusuran_tamatanController::class, 'option']);

        // alumni
        Route::get('alumni_siswa', [alumniController::class, 'index'])->name('alumni_siswa.index');
        Route::get('alumni_siswa/ajax', [alumniController::class, 'ajax'])->name('alumni_siswa.ajax');
        Route::get('alumni_siswa/detail/{id}', [alumniController::class, 'detail'])->name('alumni_siswa.detail');
        Route::get('alumni_siswa/tambah', [alumniController::class, 'create'])->name('alumni_siswa.tambah');
        Route::post('alumni_siswa/tambah/post', [alumniController::class, 'store'])->name('alumni_siswa.post');
        Route::get('alumni_siswa/edit/{id}', [alumniController::class, 'edit'])->name('alumni_siswa.edit');
        Route::put('alumni_siswa/update/{alumni_siswa}', [alumniController::class, 'update'])->name('alumni_siswa.update');
        Route::delete('alumni_siswa/delete/{id}', [alumniController::class, 'destroy'])->name('alumni_siswa.delete');
        Route::post('/alumni_siswa/destroy', [alumniController::class, 'delete_all'])->name('alumni_siswa.delete-all');
        Route::get('/export/excel/alumni_siswa', [ExcelController::class, 'alumni_siswa'])->name('export.alumni_siswa');
        // download template , import excel & template
        Route::get('/template/alumni/excel',[alumniController::class, 'download_template_excel'])->name('template.alumni.excel');
        Route::post('/import/excel/alumni_siswa', [ImportExcelController::class, 'alumni_siswa'])->name('export.alumni_siswa');
        Route::get('/alumni_siswa/{name}/download', [alumniController::class, 'downloads'])->name('alumni_siswa.download');
    });

    // nilai prakerin
    Route::middleware('role:hubin,admin,kurikulum,tu,kaprog,kepsek,bkk')->group(function () {
        Route::get('nilai_prakerin', [Nilai_PrakerinController::class, 'index'])->name('nilai_prakerin.index');
        Route::post('nilai_prakerin/header/ajax', [Nilai_PrakerinController::class, 'index'])->name('nilai_prakerin.header.index');
        Route::get('nilai_prakerin/ajax', [Nilai_PrakerinController::class, 'ajax'])->name('nilai_prakerin.ajax');
        Route::post('nilai_prakerin/ajax', [Nilai_PrakerinController::class, 'ajax'])->name('nilai_prakerin.ajax');
        Route::get('nilai_prakerin/column/ajax/{val}', [Nilai_PrakerinController::class, 'getNameColumn'])->name('nilai_prakerin.getNameColumn');
        Route::get('nilai_prakerin/get_option/ajax', [Nilai_PrakerinController::class, 'get_option'])->name('nilai_prakerin.get_option');

        Route::get('nilai_prakerin/detail/{id}', [Nilai_PrakerinController::class, 'detail'])->name('nilai_prakerin.detail');
        Route::get('nilai_prakerin/tambah', [Nilai_PrakerinController::class, 'tambah'])->name('nilai_prakerin.tambah');
        Route::get('nilai_prakerin/option/tambah_1/ajax/{id}', [Nilai_PrakerinController::class, 'option_tambah_1'])->name('nilai_prakerin.tambah');
        Route::get('nilai_prakerin/option/tambah_2/ajax/{id}', [Nilai_PrakerinController::class, 'option_tambah_2'])->name('nilai_prakerin.tambah');

        Route::get('nilai_prakerin/option/tambah_kaprog1/ajax/{id}', [Nilai_PrakerinController::class, 'option_kaprog_1'])->name('nilai_prakerin.tambah');
        Route::get('nilai_prakerin/option/tambah_kaprog2/ajax/{id}', [Nilai_PrakerinController::class, 'option_kaprog_2'])->name('nilai_prakerin.tambah');

        Route::post('nilai_prakerin/tambah/post', [Nilai_PrakerinController::class, 'store'])->name('nilai_prakerin.post');
        Route::get('nilai_prakerin/edit/{id}', [Nilai_PrakerinController::class, 'edit'])->name('nilai_prakerin.edit');
        Route::put('nilai_prakerin/update/{nilai_prakerin}', [Nilai_PrakerinController::class, 'update'])->name('nilai_prakerin.update');
        Route::delete('nilai_prakerin/delete/{id}', [Nilai_PrakerinController::class, 'destroy'])->name('nilai_prakerin.delete');
        Route::post('/nilai_prakerin/destroy', [Nilai_PrakerinController::class, 'delete_all'])->name('nilai_prakerin.delete-all');
        Route::get('/export/excel/nilai_prakerin', [ExcelController::class, 'nilai_prakerin'])->name('export.nilai_prakerin');
        Route::get('/nilai_prakerin/{name}/download', [Nilai_PrakerinController::class, 'downloads'])->name('nilai_prakerin.download');
    });

    //kategori nilai
    Route::middleware('role:hubin,admin,kurikulum,tu,siswa,kaprog,kepsek,bkk')->group(function () {
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('kategori/header/ajax', [KategoriController::class, 'index'])->name('kategori.header.index');
        // Route::get('kategori/ajax', [KategoriController::class, 'ajax'])->name('kategori.ajax');
        Route::get('kategori/ajax', [KategoriController::class, 'ajax'])->name('kategori.ajax');
        Route::get('kategori/column/ajax/{val}', [KategoriController::class, 'getNameColumn'])->name('kategori.getNameColumn');
        Route::get('kategori/get_option/ajax', [KategoriController::class, 'get_option'])->name('kategori.get_option');
        Route::get('kategori/detail/{id}', [KategoriController::class, 'detail'])->name('kategori.detail');
        Route::get('kategori/tambah', [KategoriController::class, 'tambah'])->name('kategori.tambah');
        Route::post('kategori/tambah/post', [KategoriController::class, 'store'])->name('kategori.post');
        Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
        Route::post('/kategori/destroy', [KategoriController::class, 'delete_all'])->name('kategori.delete-all');
        Route::get('/export/excel/kategori', [ExcelController::class, 'kategori'])->name('export.kategori');
        Route::get('/kategori/{name}/download', [KategoriController::class, 'downloads'])->name('kategori.download');
    });
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
    Route::PUT('/user/kelompok_laporanUpdate/{id}', [userController::class, 'kelompok_laporanUpdate'])->name('user.kelompok_laporanUpdate');



    //nilai prakerin
    Route::get('/siswa/nilai_prakerin', [SiswaNilai_PrakerinController::class, 'index'])->name('Siswanilai_prakerin.index');
    Route::get('/siswa/nilai_prakerin/header/ajax', [SiswaNilai_PrakerinController::class, 'index'])->name('Siswanilai_prakerin.header.index');
    Route::get('/siswa/nilai_prakerin/ajax', [SiswaNilai_PrakerinController::class, 'ajax'])->name('Siswanilai_prakerin.ajax');
    Route::post('/siswa/nilai_prakerin/ajax', [SiswaNilai_PrakerinController::class, 'ajax'])->name('Siswanilai_prakerin.ajax');
    Route::get('/siswa/nilai_prakerin/column/ajax/{val}', [SiswaNilai_PrakerinController::class, 'getNameColumn'])->name('Siswanilai_prakerin.getNameColumn');
    Route::get('/siswa/nilai_prakerin/get_option/ajax', [SiswaNilai_PrakerinController::class, 'get_option'])->name('Siswanilai_prakerin.get_option');

    Route::get('/siswa/nilai_prakerin/detail/{id}', [SiswaNilai_PrakerinController::class, 'detail'])->name('Siswanilai_prakerin.detail');
    Route::get('/siswa/nilai_prakerin/tambah', [SiswaNilai_PrakerinController::class, 'tambah'])->name('Siswanilais_prakerin.tambah');
    Route::get('/siswa/nilai_prakerin/option/tambah_1/ajax/{id}', [SiswaNilai_PrakerinController::class, 'Soption_tambah_1'])->name('Siswanilai_prakerin.tambah');
    Route::get('/siswa/nilai_prakerin/option/tambah_2/ajax/{id}', [SiswaNilai_PrakerinController::class, 'Soption_tambah_2'])->name('Siswanilai_prakerin.tambah');

    Route::get('/siswa/nilai_prakerin/option/tambah_kaprog1/ajax/{id}', [SiswaNilai_PrakerinController::class, 'option_kaprog_1'])->name('Siswanilai_prakerin.tambah');
    Route::get('/siswa/nilai_prakerin/option/tambah_kaprog2/ajax/{id}', [SiswaNilai_PrakerinController::class, 'option_kaprog_2'])->name('Siswanilai_prakerin.tambah');

    Route::post('/siswa/nilai_prakerin/tambah/post', [SiswaNilai_PrakerinController::class, 'store'])->name('Siswanilai_prakerin.post');
    Route::get('/siswa/nilai_prakerin/edit/{id}', [SiswaNilai_PrakerinController::class, 'edit'])->name('Siswanilai_prakerin.edit');
    Route::put('/siswa/nilai_prakerin/update/{nilai_prakerin}', [SiswaNilai_PrakerinController::class, 'update'])->name('Siswanilai_prakerin.update');
    Route::delete('/siswa/nilai_prakerin/delete/{id}', [SiswaNilai_PrakerinController::class, 'destroy'])->name('Siswanilai_prakerin.delete');
    Route::post('/siswa/nilai_prakerin/destroy', [SiswaNilai_PrakerinController::class, 'delete_all'])->name('Siswanilai_prakerin.delete-all');
    Route::get('/siswa/export/excel/nilai_prakerin', [ExcelController::class, 'nilai_prakerin'])->name('export.nilai_prakerin');
    Route::get('/siswa/nilai_prakerin/{name}/download', [SiswaNilai_PrakerinController::class, 'downloads'])->name('Siswanilai_prakerin.download');


});
Route::middleware(['web', 'auth', 'role:siswa,admin,kaprog'])->group(function () {
    Route::get('/export/pdf/jurnal/{id}', [userController::class, 'exportJurnal'])->name('export.jurnal.pdf');
});
