<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    public function data_prakerin()
    {
        return $this->hasMany(data_prakerin::class, 'id_guru','id');
    }
    public function kelompok_laporan()
    {
        return $this->hasOne(kelompok_laporan::class, 'id_guru', 'id');
    }
}
