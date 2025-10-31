<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Karyawan::create([
            'nama_karyawan' => 'Adminstrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'telp' => '08990671253',
            'level' => 'admin',
        ]);
    }
}
