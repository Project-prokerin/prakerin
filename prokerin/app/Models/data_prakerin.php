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
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id');
    }
    public function kelompok_laporan()
    {
        return $this->hasOne(kelompok_laporan::class, 'id_data_prakerin','id');
    }
    public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class, 'id');
    }
    public function guru()
    {
        return $this->belongsTo(guru::class, 'id');
    }
}
