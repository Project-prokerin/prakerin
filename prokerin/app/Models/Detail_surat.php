<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_surat extends Model
{
    use HasFactory;
    protected $table = 'detail_surat';
    protected $guarded = [];
    protected $dates = [];
    public function surat_m()
    {
        return $this->belongsTo(Surat_M::class, 'id_surat_m');
    }
    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, 'id_detail_surat', 'id');
    }
}
