<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengajuan_prakerin extends Model
{
    use HasFactory;
    protected $table = 'detail_pengajuan_prakerin';
    protected $guarded = [];

    public function pengajuan_prakerin()
    {
        return $this->belongsTo(pengajuan_prakerin::class, 'id');
    }
}
