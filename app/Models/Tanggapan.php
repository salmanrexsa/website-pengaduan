<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $primaryKey = 'id_tanggapan';

    protected $fillable = [
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_karyawan',
        'foto',
    ];

    public function karyawan()
    {
        return $this->hasOne(karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}
