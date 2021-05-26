<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = [];
    public function siswa(){
        return $this->hasMany(Siswa::class, 'id_kelas' ,'id');
    }
    public function guru(){
        return $this->hasMany(Guru::class, 'id_kelas' ,'id');
    }
    public function perusahaan(){
        return $this->hasMany(Perusahaan::class, 'id_kelas' ,'id');
    }
    public function data_prakerin(){
        return $this->hasMany(data_prakerin::class, 'id_kelas' ,'id');
    }
    public function jurnal_harian(){
        return $this->hasMany(jurnal_harian::class, 'id_kelas' ,'id');
    }
}
