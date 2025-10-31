<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        


        return view('Admin.Client.index', ['client' => $client]);
    }

    public function show($id_client)
    {
        $client = Client::where('id_client', $id_client)->first();

        return view('Admin.client.show', ['client' => $client]);
    }

    public function destroy(Client $client)
    {
        $pengaduan = Pengaduan::where('id_client', $client->id_client)->first();

        if (!$pengaduan) {
            $client->delete();

            return redirect()->route('client.index');
        } else {
            return redirect()->back()->with(['notif' => 'Can\'t delete. Client has a relationship!']);
        }
    }

    public function create()
    {
        return view('Admin.client.create');
    }

    public function store(Request $request)
    {
        // Masukkan semua data yg dikirim ke variable $data 
        $data = $request->all();

        // Buat variable $validate kemudian isinya Validator::make(datanya, [nama_field => peraturannya])
        $validate = Validator::make($data, [
            // 'id_client' => ['required', 'unique:client'],
            'nama' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:client'],
            'username' => ['required', 'string', 'regex:/^\S*$/u', 'unique:client'],
            'password' => ['required', 'min:6'],
            'telp' => ['required'],
        ]);

        // Pengecekan jika validate fails atau gagal
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Mengecek email
        $email = Client::where('email', $request->username)->first();

        // Pengecekan jika email sudah terdaftar
        if ($email) {
            return redirect()->back()->with(['pesan' => 'Email sudah terdaftar'])->withInput(['email' => 'asd']);
        }

        // Mengecek username
        $username = Client::where('username', $request->username)->first();

        // Pengecekan jika username sudah terdaftar
        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar'])->withInput(['username' => null]);
        }

        // Memasukkan data kedalam table client
        Client::create([
            // 'id_client' => $data['id_client'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        return redirect()->route('client.index');

    }

    public function edit($id_client)
    {
        $client = Client::where('id_client', $id_client)->first();

        return view('Admin.client.edit', ['client' => $client]);
    }
    
    public function update(Request $request, $id_client)
    {
        $data = $request->all();

        $client = Client::find($id_client);

        $client->update([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        return redirect()->route('client.index');
    }

}
