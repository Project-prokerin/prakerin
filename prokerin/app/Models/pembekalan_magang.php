<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembekalan_magang extends Model
{
    use HasFactory;
    protected $table = 'pembekalan_magang';
    protected $guarded = [];

    const STATUS_COLOR = [
        'pending'  => '#FFFF99',
        'active'   => '#90EE90',
        'archived' => '#00BFFF',
    ];
    public function siswa(){
                                      // foreign, owner key
        return $this->hasOne(Siswa::class,'id','id_siswa');
    }
    public function guru()
    {
                                        // owner key
        return $this->belongsTo(guru::class, 'id_guru');
    }
}
