<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orang_tua extends Model
{

    protected $table = "orang_tua";
    protected $guarded = [];
    protected $dates = ['tl_ayah','tl_ibu'];
    use HasFactory;
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }
}
