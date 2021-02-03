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
        return $this->hasOne(Siswa::class,'id');
    }
    public function guru()
    {
        return $this->belongsTo(guru::class, 'id');
    }
}
