<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_siswa extends Model
{
    protected $table = 'detail_siswa';
    protected $guarded = [];
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id');
    }

}
