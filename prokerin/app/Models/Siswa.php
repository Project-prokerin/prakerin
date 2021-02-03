<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne(User::class,'id');
    }
    public function data_prakerin()
    {
        return $this->hasOne(data_prakerin::class, 'id_siswa', 'id');
    }
    public function jurnal_prakerin()
    {
        return $this->hasMany(jurnal_prakerin::class, 'id_siswa', 'id');
    }
    public function jurnal_harian()
    {
        return $this->hasMany(jurnal_harian::class, 'id_siswa', 'id');
    }
    public function pembekalan_magang()
    {
        return $this->hasOne(pembekalan_magang::class,'id_siswa','id');
    }
}
