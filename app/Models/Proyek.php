<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class proyek extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_proyek';

    protected $table = 'proyek';

    protected $guarded= [];
}
