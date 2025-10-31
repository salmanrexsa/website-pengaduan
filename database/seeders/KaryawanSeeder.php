<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Karyawan::factory(3)->create();
    }
}
