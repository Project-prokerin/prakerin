<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portofolio_siswa extends Model
{
    protected $table = 'portofolio_siswa';
    protected $guarded = [];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'NIPD','NIPD');
    }
}
