<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class KaryawaneditController extends Controller
{
    public function index($id_karyawan)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();

        return view('Admin.karyawann.edit', ['karyawan' => $karyawan]);
    }
}