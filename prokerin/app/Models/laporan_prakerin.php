<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_prakerin extends Model
{
    use HasFactory;
    protected $table = 'laporan_prakerin';
    protected $guarded = [];
    public function kelompok_laporan()
    {
        return $this->hasOne(kelompok_laporan::class, 'id');
    }
}
