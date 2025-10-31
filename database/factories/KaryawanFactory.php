<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_karyawan' => 'wawan',
            'username' => 'admin',
            'password' => '12345',
            'telp'    => '085727515871',
            'level'     => 'admin',
        ];
    }
}
