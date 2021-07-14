<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'id_siswa',
        'id_guru',
        'password',
        'role',
        'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'last_login_at','created_at','updated_at'
    ];

    public function siswa()
    {
          // foreign, owner key
        return $this->hasOne(Siswa::class, 'id_user', 'id');
    }
    public function guru()
    {
        // foreign, owner key
        return $this->hasOne(guru::class, 'id_user', 'id');
    }
}
