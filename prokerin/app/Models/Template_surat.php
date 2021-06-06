<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template_surat extends Model
{
    use HasFactory;
    protected $table = 'template_surat';
    protected $guarded = [];
    protected $dates = [];
    public function surat_keluar()
    {
        return $this->hasMany(Detail_surat_k::class, 'id_template_surat', 'id');
    }
}
