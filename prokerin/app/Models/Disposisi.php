<?php

namespace App\Models;

use Database\Seeders\detail_suratSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'disposisi';
    protected $guarded = [];
    protected $dates = [];
    public function detail_surat()
    {
        return $this->belongsTo(Detail_surat::class, 'id_detail_surat');
    }
}
