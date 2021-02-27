<?php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
    return $value->IsoFormat('DD MMMM YYYY');
}
// untuk jam
function jam($value)
{
    return $value->format('H:i');
}

// pemabakan maganag
function warna($value)
{
    // file portofolio
    if ($value === 'file_portofolio') {
        if (empty(Auth::user()->siswa->pembekalan_magang->$value)) {
            return 'background-color:#f2f2f2;color:black;text-decoration:none;';
        }
        $val = Auth::user()->siswa->pembekalan_magang->$value;
        if (!empty($val)) {
            return 'background-color:#4cd137;color:white;text-decoration:none;';
        } else {
            return 'background-color:#f2f2f2;color:black;text-decoration:none;';
        }
    }
    // normal
    if (empty(Auth::user()->siswa->pembekalan_magang->$value)) {
        return 'background-color:#e84118;color:white';
    }
    $val = Auth::user()->siswa->pembekalan_magang->$value;
    if ($val == 'sudah') {
        return 'background-color:#4cd137;color:white';
    } else if ($val == 'belum') {
        return 'background-color:#e84118;color:white';
    }
}
function PembekalanText($value)
{
    if (empty(Auth::user()->siswa->pembekalan_magang->$value)) {
        return 'belum mengumpulan';
    }
    $val = Auth::user()->siswa->pembekalan_magang->$value;
    if ($val == 'sudah') {
        return 'sudah mengumpulkan';
    } else if ($val == 'belum') {
        return 'belum mengumpulkan';
    }
}

// stataus
function status(){
    $tanggal = Carbon::now()->format('Y-m-d');
    if ( $tanggal <= siswa('data_prakerin')->tgl_mulai->format('Y-m-d')) {
        return 'Belum Mulai Magang';
    }else if($tanggal >= siswa('data_prakerin')->tgl_mulai->format('Y-m-d') and $tanggal <= siswa('data_prakerin')->tgl_selesai->format('Y-m-d')){
        return 'Sedengan Magang';
    }else if($tanggal >= siswa('data_prakerin')->tgl_selesai->format('Y-m-d')){
        return 'Sudah selesai Magang';
    }
}
function statusWarna()
{
    $tanggal = Carbon::now()->format('Y-m-d');
    if ($tanggal <= siswa('data_prakerin')->tgl_mulai->format('Y-m-d')) {
        return 'background-color:#4cd137;color:white';
    } else if ($tanggal >= siswa('data_prakerin')->tgl_mulai->format('Y-m-d') and $tanggal <= siswa('data_prakerin')->tgl_selesai->format('Y-m-d')) {
        return 'background-color:#fbc531;color:white';
    } else if ($tanggal >= siswa('data_prakerin')->tgl_selesai->format('Y-m-d')) {
        return 'background-color:#e84118;color:white';
    }
}

function laporan(){
    return Auth::user()->siswa->data_prakerin->kelompok_laporan;
}
?>
