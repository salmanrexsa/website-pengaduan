<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $table = 'client';

    protected $primaryKey = 'id_client';

    protected $guarded= [];
        // 'nama',
        // 'email',
        // 'email_verified_at',
        // 'username',
        // 'password',
        // 'telp',
        // 'provider_id',
        // 'provider',
    
}
