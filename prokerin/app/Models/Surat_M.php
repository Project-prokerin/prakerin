<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_M extends Model
{
    use HasFactory;
    protected $table = 'surat_m';
    protected $guarded = [];
    protected $dates = [];
    public function surat_masuk()
    {
        return $this->belongsTo(Surat_masuk::class , 'id_surat_masuk');
    }
    public function detail_surat()
    {
        return $this->hasOne(Detail_surat::class, 'id_surat_m', 'id');
    }
}
