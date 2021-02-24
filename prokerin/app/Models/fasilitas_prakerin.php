<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas_prakerin extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_prakerin';
    protected $guarded = [];
    public function jurnal_prakerin()
    {
        return $this->belongsTo(jurnal_prakerin::class,'id_jurnal_prakerin');
    }
}
