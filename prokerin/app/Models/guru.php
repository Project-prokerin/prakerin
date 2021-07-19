<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = [];
    public function user()
    {
        // foreign, owner key
        return $this->belongsTo(User::class, 'id_user');
    }
    public function data_prakerin()
    {
          // foreign, owner key
        return $this->hasMany(data_prakerin::class, 'id_guru','id');
    }
    public function kelompok_laporan()
    {
          // foreign, owner key
        return $this->hasOne(kelompok_laporan::class, 'id_guru', 'id');
    }
    public function pengajuan_prakerin()
    {
        // foreign, owner key
        return $this->hasOne(pengajuan_prakerin::class,'id_guru','id');
    }
    public function pembekalan_magang()
    {
          // foreign, owner key
        return $this->hasMany(pembekalan_magang::class, 'id_guru', 'id');
    }
    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'id_jurusan');
    }

    // surat masuk
    public function surat_masuk_dari() // dari
    {
        return $this->hasMany(Surat_masuk::class, 'id_untuk', 'id');
    }
    public function surat_masuk_untuk() // untuk
    {
        return $this->hasMany(Surat_masuk::class, 'id_dari', 'id');
    }
    // surat keluar
    public function surat_keluar_dari() // dari
    {
        return $this->hasMany(Surat_masuk::class, 'id_untuk', 'id');
    }
    public function surat_keluar_untuk() // untuk
    {
        return $this->hasMany(Surat_masuk::class, 'id_dari', 'id');
    }
    public function isi_surat()
    {
        return $this->hasOne(isi_surat::class, 'id_guru','id');
    }

      // feedback
      public function feedback_dari() // dari
      {
          return $this->hasMany(feedback::class, 'id_untuk', 'id');
      }
      public function feedback_untuk() // untuk
      {
          return $this->hasMany(feedback::class, 'id_dari', 'id');
      }
}
