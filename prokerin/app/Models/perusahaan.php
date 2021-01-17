<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $guarded = [];
    public function kelompok_prakerin()
    {
        return $this->hasMany(kelompok_prakerin::class, 'id_perusahaan', 'id');
    }
    public function kelompok_laporan()
    {
        return $this->hasMany(kelompok_laporan::class, 'id_perusahaan', 'id');
    }
    public function jurnal_prakerin()
    {
        return $this->hasMany(jurnal_prakerin::class, 'id_perusahaan', 'id');
    }

}
