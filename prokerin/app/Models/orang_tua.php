<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orang_tua extends Model
{
    use HasFactory;
    protected $table = "orang_tua";
    protected $guarded = [];
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }
}
