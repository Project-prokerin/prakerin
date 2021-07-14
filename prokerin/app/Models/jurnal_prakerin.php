<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurnal_prakerin extends Model
{
    use HasFactory;
    protected $table = 'jurnal_prakerin';
    protected $guarded = [];
    protected $dates = ['hari_pelaksanaan','jam_masuk','jam_istirahat','jam_pulang'];
    public function siswa()
    {
                                            // owner key
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    public function perusahaan()
    {
                                                // owner key
        return $this->belongsTo(perusahaan::class, 'id_perusahaan');
    }
    public function fasilitas_prakerin(){
        return $this->hasOne(fasilitas_prakerin::class, 'id_jurnal_prakerin', 'id');
    }
}
