<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_prakerin extends Model
{
    use HasFactory;
    protected $table = 'nilai_prakerin';
    protected $guarded = [];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
    public function kelompok_laporan()
    {
        return $this->belongsTo(kelompok_laporan::class, 'id_kelompok_laporan');
    }
    public function kategori_nilai()
    {
        return $this->belongsTo(Kategori_nilai_prakerin::class, 'id_ketegori');
    }
    Public function jurusan(){
        return $this->belongsTo(jurusan::class,'id_jurusan');
      }
    
}
