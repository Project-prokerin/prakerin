<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_prakerin extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_prakerin';
    protected $guarded = [];
      public function data_prakerin()
    {
                                              
        return $this->hasOne(data_prakerin::class,'id','id_data_prakerin');
    }

    public function guru()
    {
        // foreign  owner key
        return $this->hasOne(guru::class, 'id', 'id_guru');
    }
    public function detail_pengajuan_prakerin()
    {
        return $this->hasOne(detail_pengajuan_prakerin::class, 'id_pengajuan_prakerin', 'id');
    }
}
