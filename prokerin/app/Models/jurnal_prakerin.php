<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurnal_prakerin extends Model
{
    use HasFactory;
    protected $table = 'jurnal_prakerin';
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
