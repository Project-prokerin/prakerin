<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $dates = ['tanggal_lahir'];
    protected $guarded = [];
    public function user()
    {
          // foreign, owner key
       return $this->belongsTo(User::class, 'id_user');
    }
    public function data_prakerin()
    {
          // foreign, owner key
        return $this->hasOne(data_prakerin::class, 'id_siswa', 'id');
    }
    public function jurnal_prakerin()
    {
          // foreign, owner key
        return $this->hasMany(jurnal_prakerin::class, 'id_siswa', 'id');
    }
    public function jurnal_harian()
    {
          // foreign, owner key
        return $this->hasMany(jurnal_harian::class, 'id_siswa', 'id');
    }
    public function pembekalan_magang()
    {
          // foreign, owner key
        return $this->hasOne(pembekalan_magang::class,'id_siswa','id');
    }
    public function orang_tua()
    {
          // foreign, owner key
        return $this->hasOne(orang_tua::class, 'id_siswa', 'id');
    }
    public function sekolah_asal()
    {
          // foreign, owner key
        return $this->hasOne(sekolah_asal::class, 'id_siswa', 'id');
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas');
    }
      public function pengajuan_prakerin()
    {
        return $this->hasOne(pengajuan_prakerin::class, 'id_siswa', 'id');
    }
}
