<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni_siswa extends Model
{
    use HasFactory;
    protected $table = 'alumni_siswa';
    protected $guarded = ['_token'];
    public function penelusuran_tamatan()
    {
        return $this->hasOne(Penelusuran_tamatan::class, 'id_alumni','id');
    }
}
