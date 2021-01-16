<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    public function user()
    {
        return $this->hasOne(User::class,'id');
    }
    public function detail_siswa()
    {
        return $this->hasOne(detail_siswa::class, 'id_siswa', 'id');
    }
    public function portofolio_siswa()
    {
        return $this->hasMany(portofolio_siswa::class, 'NIPD', 'NIPD');
    }
    public function pengalaman()
    {
        return $this->hasMany(pengalaman::class, 'id_siswa', 'id');
    }
    public function kelompok_prakerin()
    {
        return $this->hasMany(kelompok_prakerin::class, 'id_siswa', 'id');
    }
    public function kelompok_laporan()
    {                                              // foreign , owner
        return $this->hasMany(kelompok_laporan::class, 'id_siswa', 'id');
    }
    public function jurnal_prakerin()
    {                                              // foreign , owner
        return $this->hasMany(jurnal_prakerin::class, 'id_siswa', 'id');
    }
}
