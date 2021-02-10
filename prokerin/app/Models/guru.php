<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = [];
    public function data_prakerin()
    {
          // foreign, owner key
        return $this->hasMany(data_prakerin::class, 'id_guru','id');
    }
    public function kelompok_laporan()
    {
          // foreign, owner key
        return $this->hasOne(kelompok_laporan::class, 'id_guru', 'id');
    }
    public function pembekalan_magang()
    {
          // foreign, owner key
        return $this->hasMany(pembekalan_magang::class, 'id_guru', 'id');
    }
    public function user()
    {
        // foreign, owner key
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
