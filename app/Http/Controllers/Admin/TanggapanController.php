<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where ('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($tanggapan) {
            
            $image = $request->file('foto');
            if ($image) {
                $destinationpath='assets/tanggapan';
                $profileimage=date('YmdHis').".".$image->getClientOriginalExtension();
                $image->MOVE($destinationpath, $profileimage);
                $input['foto']="$profileimage";
    
            } else {
                $profileimage = $tanggapan->foto;
            }
            
            $pengaduan->update(['status' => $request->status]);
            

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_karyawan' => Auth::guard('admin')->user()->id_karyawan,
               'foto'=>$profileimage, 
            ]);

          


            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan, 'foto'=>$tanggapan])->with(['status' => 'Berhasil Dikirim!']);
        } else {
            
            $image=$request->file('foto');
            if ($image) {
                $destinationpath='assets/tanggapan';
                $profileimage=date('YmdHis').".".$image->getClientOriginalExtension();
                $image->MOVE($destinationpath, $profileimage);
                $input['foto']="$profileimage";
    
 
            }
            
            $pengaduan->update(['status' => $request->status]);

            // echi 
            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_karyawan' => Auth::guard('admin')->user()->id_karyawan,
                'foto'=> $image,
            ]);
    

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan, 'foto'=>$tanggapan])->with(['status' => 'Berhasil Dikirim!']);
        }
    }
}