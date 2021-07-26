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
    public function perusahaan()
    {
        return $this->hasMany(perusahaan::class, 'id_jurusan', 'id');
    }
    public function nilai_prakerin(){
        return $this->HasMany(nilai_prakerin::class, 'id_jurusan','id');
      }
}
