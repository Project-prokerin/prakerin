<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $guarded = [];
    protected $dates = [];


    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class, 'id_disposisi');
    }
    public function dari_guru()
    {
        return $this->belongsTo(guru::class, 'id_dari');
    }
    public function untuk_guru()
    {
        return $this->belongsTo(guru::class, 'id_untuk');
    }
}
