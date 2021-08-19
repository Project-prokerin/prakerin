<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_prakerin extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_prakerin';
    protected $guarded = [];
    public function siswa()
    {
                                              
        return $this->hasOne(Siswa::class,'id','id_siswa');
    }

    public function guru()
    {
        // foreign  owner key
        return $this->hasOne(guru::class, 'id', 'id_guru');
    }
    public function detail_pengajuan_prakerin()
    {
        return $this->hasOne(detail_pengajuan_prakerin::class, 'id_pengajuan_prakerin', 'id');
    }
    public function tanda_tangan()
    {
        return $this->belongsTo(Tanda_tangan::class, 'id_tanda_tangan');
    }
}
