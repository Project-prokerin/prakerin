<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_surat_k extends Model
{
    use HasFactory;
    protected $table = 'detail_surat_k';
    protected $guarded = [];
    protected $dates = [];
     public function template_surat()
    {
        return $this->belongsTo(Template_surat::class, 'id_template_surat');
    }
    public function surat_keluar()
    {
        return $this->belongsTo(surat_keluar::class, 'id_surat_keluar');
    }
    public function tanda_tangan()
    {
        return $this->belongsTo(Tanda_tangan::class, 'id_tanda_tangan');
    }
    public function isi_surat()
    {
        return $this->hasOne(Isi_surat::class, 'id_detail_surat_k','id');
    }
}
