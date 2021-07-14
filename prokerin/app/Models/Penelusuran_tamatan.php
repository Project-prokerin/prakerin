<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelusuran_tamatan extends Model
{
    use HasFactory;
    protected $table = 'penelusuran_tamatan';
    protected $guarded = [];
    public function alumni_siswa()
    {
        return $this->belongsTo(alumni_siswa::class,'id_alumni');
    }
}
