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
                                            // owner key
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    public function perusahaan()
    {
                                                // owner key
        return $this->belongsTo(perusahaan::class, 'id_perusahaan');
    }
}
