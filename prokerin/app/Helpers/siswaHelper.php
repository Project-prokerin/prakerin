<?php
use Illuminate\Support\Facades\Auth;

// untuk siswa
function siswa($value)
{
    switch ($value) {
        case $value == '':
            return empty(Auth::user()->siswa) ? '' : Auth::user()->siswa;
            break;
        case $value == 'data_prakerin' || 'jurnal_harian' || 'jurnal_prakerin' || 'pembekalan_magang':
            return empty(Auth::user()->siswa->$value)? '' : Auth::user()->siswa->$value;
            break;
        case $value == 'perusahaan' || 'kelompok_laporan':
            return empty(Auth::user()->siswa->data_prakerin->$value) ? '' : Auth::user()->siswa->data_prakerin->$value;
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
    return $value->IsoFormat('H:i');
}
?>
