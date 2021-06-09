<?php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\jurnal_harian;
use App\Models\jurnal_prakerin;

;
// untuk siswa
function siswa($value)
{
    switch ($value) {
        case 'user';
            return empty(Auth::user()) ? '' : Auth::user();
            break;
        case 'main':
            return empty(Auth::user()->siswa) ? '' : Auth::user()->siswa;
            break;
        case 'data_prakerin' || 'jurnal_harian' || 'jurnal_prakerin' || 'pembekalan_magang';
            return empty(Auth::user()->siswa->$value)? '' : Auth::user()->siswa->$value;
            break;
        }
}
// untuk tanggal
function tanggal($value)
{
    if (empty($value)) {
        return '';
    }
    return empty($value->IsoFormat('DD MMMM YYYY')) ? '' : $value->IsoFormat('DD MMMM YYYY') ;
}
// untuk jam
function jam($value)
{
    return $value->format('H:i');
}
// pemabakan maganag
function warna($value)
{
    // jika account siswa kosong
    if (empty(siswa('main') || siswa('main')->pembekalan_magang)) {
        return 'background-color:#e84118;color:white;text-decoration:none;';
    }
     // file portofolio
    if ($value === 'file_portofolio') {
        if (Auth::user()->siswa->pembekalan_magang->$value === 'belum') {
            return 'background-color:#f2f2f2;color:black;text-decoration:none;';
        }else{
            return 'background-color:#4cd137;color:white;text-decoration:none;';
        }
    }
    // normal
    // if (empty(Auth::user()->siswa->pembekalan_magang->$value)) {
    //     return 'background-color:#e84118;color:white';
    // }
    $val = Auth::user()->siswa->pembekalan_magang->$value;
    if ($val == 'sudah') {
        return 'background-color:#4cd137;color:white';
    } else if ($val == 'belum') {
        return 'background-color:#e84118;color:white';
    }
}
function PembekalanText($value)
{
    if (empty(siswa('main'))) {
        return 'Anda tidak di izinkan untuk melihat status anda';
    }
    if (empty(Auth::user()->siswa->pembekalan_magang)) {
        return 'Belum mengumpulkan';
    }
    $val = Auth::user()->siswa->pembekalan_magang->$value;
    if ($val == 'sudah') {
        return 'Sudah mengumpulkan';
    } else if ($val == 'belum') {
        return 'Belum mengumpulkan';
    }
}

// pembekalan link
function links($param)
{
    $array = explode(' ', $param);
    unset($array[0]);
    return implode(' ', $array) ;
}
// stataus magang helper
function status(){
    $tanggal = Carbon::now()->format('Y-m-d');
    // validasi
    if (empty(siswa('data_prakerin')->status) ) {
        return "Status kosong";
    }
    // validasi
    switch (siswa('data_prakerin')->status) {
        case 'Pengajuan':
            return 'Pengajuan Magang';
            break;
        case 'Magang':
            return 'Magang';
            break;
        case 'Selesai':
            return 'Selesai Magang';
            break;
        case 'Batal':
            return 'Batal Magang';
            break;
    }
}
function statusWarna()
{
    if (empty(siswa('data_prakerin')->status)) {
        return 'background-color:#e84118;color:white';
    }
    // validasi
    switch (siswa('data_prakerin')->status) {
        case 'Pengajuan':
            return 'background-color:#425df5;color:white';
            break;
        case 'Magang':
            return 'background-color:#fbc531;color:white';
            break;
        case 'Selesai':
            return 'background-color:#57b846;color:white';
            break;
        case 'Batal':
            return 'background-color:#e84118;color:white';
            break;
    }
}
// jurnal harian
function jurnal_val(){
    $tanggal =  jurnal_harian::where('id_siswa', siswa('main')->id)->where('tanggal', Carbon::now()->format('Y-m-d'))->first();
    if (empty(siswa('data_prakerin')->tgl_mulai) || empty(siswa('data_prakerin')->tgl_selesai)) {
        return 'Tanggal belum di tetapkan';
    }
    if (Carbon::now()->format('Y-m-d') < siswa('data_prakerin')->tgl_mulai->format('Y-m-d')) {
        return 'Belum mulai';
    }
    if (Carbon::now()->format('Y-m-d') > siswa('data_prakerin')->tgl_selesai->format('Y-m-d')) {
        return 'Absen selesai';
    }

    if (empty(siswa('data_prakerin')->perusahaan)) {
        return 'Data perusahan kosong';
    }else if(!empty($tanggal)){
        return 'Sudah Absen';
    }else if (empty($tanggal)) {
        return 'Absen';
    }
}
// jurnal disable / enable
function jurnal_status()
{
    $tanggal = jurnal_harian::where('id_siswa', siswa('main')->id)->where('tanggal', Carbon::now()->format('Y-m-d'))->first();
    if (empty(siswa('data_prakerin')->tgl_mulai) || empty(siswa('data_prakerin')->tgl_selesai)) {
        return 'disabled';
    }
    if ( Carbon::now()->format('Y-m-d') > siswa('data_prakerin')->tgl_selesai->format('Y-m-d') || Carbon::now()->format('Y-m-d') < siswa('data_prakerin')->tgl_mulai->format('Y-m-d') ) {
        return 'disabled';
    }
    if (empty(siswa('data_prakerin')->perusahaan)) {
        return 'disabled';
    } else if (!empty($tanggal)) {
        return 'disabled';
    } else if (empty($tanggal)) {
        return 'Absen';
    }
}

// jurnal prakerin
function jurnal_p_val()
{
    if (empty(siswa('data_prakerin')->tgl_mulai) || empty(siswa('data_prakerin')->tgl_selesai)) {
        return 'Tanggal belum di tetapkan';
    }
    if (empty(siswa('data_prakerin')->perusahaan)) {
        return 'Data perusahan kosong';
    }
    if (Carbon::now()->format('Y-m-d') < siswa('data_prakerin')->tgl_mulai->format('Y-m-d')) {
        return 'Belum mulai';
    }
    if (Carbon::now()->format('Y-m-d') >= siswa('data_prakerin')->tgl_mulai->format('Y-m-d') and Carbon::now()->format('Y-m-d') <= siswa('data_prakerin')->tgl_selesai->format('Y-m-d')) {
        return 'Tambah jurnal';
    }
    if (Carbon::now()->format('Y-m-d') > siswa('data_prakerin')->tgl_selesai->format('Y-m-d')) {
        return 'Jurnal selesai';
    }
}
// jurnal disable / enable
function jurnal_p_stat()
{
    if (Carbon::now()->format('Y-m-d') > siswa('data_prakerin')->tgl_selesai->format('Y-m-d') || Carbon::now()->format('Y-m-d') < siswa('data_prakerin')->tgl_mulai->format('Y-m-d')) {
        return 'disabled';
    }
    if (empty(siswa('data_prakerin')->tgl_mulai) || empty(siswa('data_prakerin')->tgl_selesai) || empty(siswa('data_prakerin')->perusahaan)) {
        return 'disabled';
    }else{
        return '';
    }
}

function laporan(){
    return Auth::user()->siswa->data_prakerin->kelompok_laporan;
}
?>
