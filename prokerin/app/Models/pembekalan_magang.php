<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembekalan_magang extends Model
{
    use HasFactory;
    protected $table = 'pembekalan_magang';
    protected $guarded = [];
    public function siswa(){
                                    // foreign field id_siswa di siwa
        return $this->hasOne(Siswa::class,'id','id_siswa');
    }
    public function guru()
    {
                                        // owner key
        return $this->belongsTo(guru::class, 'id_guru');
    }
}
