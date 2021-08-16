<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $guarded = [];
    protected $dates = ['tanggal_mou'];
    public function data_prakerin()
    {
                                                      // foreign, owner key
        return $this->hasMany(data_prakerin::class, 'id_perusahaan', 'id');
    }
    public function jurnal_prakerin()
    {
                                                      // foreign, owner key
        return $this->hasMany(jurnal_prakerin::class, 'id_perusahaan', 'id');
    }
    public function jurnal_harian()
    {
                                                      // foreign, owner key
        return $this->hasMany(jurnal_harian::class, 'id_perusahaan', 'id');
    }

    // public function jurusan()
    // {
    //     return $this->belongsTo(jurusan::class, 'id_jurusan');
    // }

}
