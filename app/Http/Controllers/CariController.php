<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
// use illuminate\Support\Facades\DB;


class CariController extends Controller
{
   

    public function Cari(Request $request)
    {
        return view('user.landingg');
    }

    public function golekiKode(Request $request)
    {
        $cari = $request->cari;
        // $request = Pengaduan::where($request->kode_booking)->first();

        $pengaduan = Pengaduan::where('kode_booking', $cari)->get();
        // return $pengaduan;
        return view('user.riwayatpengaduan', ['pengaduan'=>$pengaduan]);

    }
}
