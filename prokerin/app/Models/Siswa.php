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
    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas');
    }
    public function pengajuan_prakerin()
    {
        return $this->hasOne(pengajuan_prakerin::class, 'id_siswa', 'id');
    }
  public function penelusuran_tamatan()
  {
    return $this->hasOne(penelusuran_tamatan::class, 'id_siswa', 'id');
  }
  public function Nilai_prakerin()
  {
    return $this->hasMany(Nilai_prakerin::class, 'id_siswa', 'id');
  }
    public function kelompok_laporan()
    {
        return $this->hasOne(kelompok_laporan::class, 'id_siswa', 'id');
    }
}
