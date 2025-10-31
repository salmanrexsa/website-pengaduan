<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_karyawan';

    protected $table = 'karyawan';

    protected $fillable = [
        'nama_karyawan',
        'username',
        'password',
        'telp',
        'level',
    ];
}
