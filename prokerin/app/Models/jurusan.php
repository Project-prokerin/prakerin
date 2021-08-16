<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany(kelas::class, 'id_jurusan', 'id');
    }
    public function guru()
    {
        return $this->hasMany(guru::class, 'id_jurusan', 'id');
    }
    // public function perusahaan()
    // {
    //     return $this->hasMany(perusahaan::class, 'id_jurusan', 'id');
    // }
    public function nilai_prakerin(){
        return $this->HasMany(Nilai_prakerin::class, 'id_jurusan','id');
    }
    public function kategori_nilai_prakerin()
    {
        return $this->hasMany(Kategori_nilai_prakerin::class,'id_jurusan','id');
    }
}
