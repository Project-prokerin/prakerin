<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_prakerin extends Model
{
    use HasFactory;
    protected $table = 'data_prakerin';
    protected $guarded = [];
    protected $dates = ['tgl_mulai','tgl_selesai'];
    public function siswa()
    {   // belongsto invers dari relasi
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    // public function kelompok_laporan()
    // {
    //     return $this->hasOne(kelompok_laporan::class, 'id_data_prakerin','id');
    // }

    public function pengajuan_prakerin()
    {
        return $this->hasOne(pengajuan_prakerin::class, 'id_data_prakerin', 'id');
    }
    public function perusahaan()
    {
                                             // foreign dari field perusahaan ke perusahaan id
        return $this->belongsTo(perusahaan::class, 'id_perusahaan');
    }
    public function guru()
    {
                                        // owner key
        return $this->belongsTo(guru::class, 'id_guru');
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas');
    }
}
