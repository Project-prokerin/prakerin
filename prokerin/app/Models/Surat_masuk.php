<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_masuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
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
    public function surat_m()
    {
        return $this->hasOne(Surat_M::class, 'id_surat_masuk' , 'id');
    }
}
