<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_nilai_prakerin extends Model
{
    use HasFactory;
    protected $table = 'kategori_nilai_prakerin';
    protected $guarded = [];
    public function nilai_prakerin()
    {
        return $this->hasOne(nilai_prakerin::class, 'id_ketegori','id');
    }
}
