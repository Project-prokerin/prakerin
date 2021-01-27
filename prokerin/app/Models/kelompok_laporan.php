<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompok_laporan extends Model
{
    use HasFactory;
    protected $table = 'kelompok_laporan';
    protected $guarded = [];
    public function data_prakerin()
    {
        return $this->hasOne(data_prakerin::class, 'id');
    }
    public function laporan_prakerin()
    {
        return $this->hasOne(laporan_prakerin::class, 'id_kelompok_laporan','id');
    }
    public function guru()
    {
        return $this->hasOne(guru::class, 'id');
    }
}
