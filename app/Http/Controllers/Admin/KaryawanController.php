<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();

        return view('Admin.Karyawan.index', ['petugas' => $karyawan]);
    }

    public function create()
    {
        return view('Admin.karyawann.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_karyawan' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:karyawan'],
            'password' => ['required', 'string', 'min:6'],
            'telp' => ['required'],
            'level' => ['required', 'in:admin,petugas'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $username = Karyawan::where('username', $data['username'])->first();

        if ($username) {
            return redirect()->back()->with(['notif' => 'Username sudah digunakan!']);
        }

        Karyawan::create([
            'nama_karyawan' => $data['nama_karyawan'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        return redirect()->route('karyawan.index');
    }

    public function edit($id_karyawan)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();

        return view('Admin.karyawan.edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id_karyawan)
    {
        $data = $request->all();

        $karyawan = Karyawan::find($id_karyawan);

        $karyawan->update([
            'nama_karyawan' => $data['nama_karyawan'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        return redirect()->route('karyawan.index');
    }

    public function destroy($id_karyawan)
    {
        $karyawan = Karyawan::findOrFail($id_karyawan);

        $tanggapan = Tanggapan::where('id_karyawan', $id_karyawan)->first();

        if (!$tanggapan) {
            $karyawan->delete();

            return redirect()->route('karyawan.index');
        } else {
            return redirect()->back()->with(['notif' => 'Can\'t delete. Petugas has a relationship!']);
        }
    }

    // public function ubah($id_karyawan)
    // {
    //     $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();

    //     return view('Admin.karyawan.ubah', ['karyawan' => $karyawan]);
    // }
    
}
