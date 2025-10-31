<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\proyek;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ProyekController extends Controller
{
        public function index()
        {
            $proyek = proyek::all();

            return view('admin.proyek.index', ['proyek'=>$proyek]);
        }

        public function create()
        {
            return view('Admin.proyek.create');
        }
    
        public function store(Request $request)
        {
            $data = $request->all();

    
            // $username = proyek::where('username', $data['username'])->first();
    
            // if ($username) {
            //     return redirect()->back()->with(['notif' => 'Username sudah digunakan!']);
            // }
    
            proyek::create([
                'nama_proyek' => $data['nama_proyek'],
                'id_client' => $data['id_client'],
                'url_proyek'=>$data['url_proyek'],
            ]);
    
            return redirect()->route('admin.proyek.index');
        
            


        }
}