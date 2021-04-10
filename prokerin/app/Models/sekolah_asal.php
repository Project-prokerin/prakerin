<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah_asal extends Model
{
    use HasFactory;
    protected $table = "sekolah_asal";
    protected $guarded = [];
    public function siswa()
    {
          // foreign, owner key
        return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }
}
