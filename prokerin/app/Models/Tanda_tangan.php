<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanda_tangan extends Model
{
    use HasFactory;
    protected $table = 'tanda_tangan';
    protected $guarded = [];
    protected $dates = [];
    public function detail_surat_k()
    {
        return $this->hasMany(Detail_surat_k::class, 'id_tanda_tangan','id');
    }
    public function pengajuan_prakerin()
    {
        return $this->hasMany(pengajuan_prakerin::class, 'id_tanda_tangan','id');
    }
}
