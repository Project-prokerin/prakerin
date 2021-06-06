<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_keluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $guarded = [];
    protected $dates = [];

    public function dari_guru()
    {
        return $this->belongsTo(guru::class, 'id_dari');
    }
    public function untuk_guru()
    {
        return $this->belongsTo(guru::class, 'id_untuk');
    }

    public function detail_surat()
    {
        return $this->hasOne(Detail_surat_k::class, 'id_surat_keluar','id');
    }
}
