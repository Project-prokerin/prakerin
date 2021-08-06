<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompok_laporan extends Model
{
    use HasFactory;
    protected $table = 'kelompok_laporan';
    protected $guarded = [];
    public function siswa()
    {
                                              // foreign owner key
        return $this->hasOne(Siswa::class,'id','id_siswa');
    }
    public function laporan_prakerin()
    {
                                                    // foreign             owner key
        return $this->hasOne(laporan_prakerin::class, 'id_kelompok_laporan','id');
    }
    public function guru()
    {
                                    // foreign  owner key
        return $this->hasOne(guru::class, 'id','id_guru');
    }
    public function nilai_prakerin()
    {
        return $this->hasMany(nilai_prakerin::class, 'id_kelompok_laporan', 'id');
    }
}
