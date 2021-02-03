<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurnal_harian extends Model
{
    protected $table = 'jurnal_harian';
    protected $guarded = [];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id');
    }
    public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class, 'id');
    }
}
