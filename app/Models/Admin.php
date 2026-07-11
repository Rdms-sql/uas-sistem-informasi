<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_admin');
    }
}