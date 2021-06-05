<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isi_surat extends Model
{
    use HasFactory;
    protected $table = 'isi_surat';
    protected $guarded = [];
    protected $dates = [];
    public function detail_surat()
    {
        return $this->hasOne(Detail_surat_k::class, 'id_isi_surat');
    }
    public function guru()
    {
        return $this->belongsTo(guru::class, 'id_guru');
    }
}
