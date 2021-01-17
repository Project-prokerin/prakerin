<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompok_laporan extends Model
{
    protected $table = 'kelompok_prakerin';
    protected $guarded = [];
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id');
    }
    public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class, 'id');
    }
}
