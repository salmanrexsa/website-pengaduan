<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmailUntukRegistrasiPengaduanClient;
use App\Models\Client;
use App\Models\Pengaduan;
use App\Models\proyek;
use Facade\FlareClient\Http\Client as HttpClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class UserController extends Controller
{
    public function loginsik()
    {
        return view ('user.login');
    }

    public function index()
    {
        // Menghitung jumlah pen gaduan yang ada di table
        $pengaduan = Pengaduan::all()->count();

        // Arahkan ke file user/landing.blade.php
        return view('user.landingg', ['pengaduan' => $pengaduan]);
    }

    public function login(Request $request)
    {
        // Pengecekan $request->username isinya email atau username
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            // jika isinya string email, cek email nya di table client
            $email = Client::where('email', $request->username)->first();

            // Pengecekan variable $email jika tidak ada di table client
            if (!$email) {
                return redirect()->back()->with(['pesan' => 'Email tidak terdaftar']);
            }

            // jika email ada, langsung check password yang dikirim di form dan di table, hasilnya sama atau tidak
            $password = Hash::check($request->password, $email->password);

            // Pengecekan variable $password jika password tidak sama dengan yang dikirimkan
            if (!$password) {
                return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
            }

            // Jalankan fungsi auth jika berjasil melewati validasi di atas
            if (Auth::guard('client')->attempt(['email' => $request->username, 'password' => $request->password])) {
                // Jika login berhasil
                return redirect()->back();
            } else {
                // Jika login gagal
                return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
            }
        } else {
            // jika isinya string username, cek username nya di table client
            $username = Client::where('username', $request->username)->first();

            // Pengecekan variable $username jika tidak ada di table client
            if (!$username) {
                return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
            }

            // jika username ada, langsung check password yang dikirim di form dan di table, hasilnya sama atau tidak
            $password = Hash::check($request->password, $username->password);

            // Pengecekan variable $password jika password tidak sama dengan yang dikirimkan
            if (!$password) {
                return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
            }

            // Jalankan fungsi auth jika berjasil melewati validasi di atas
            if (Auth::guard('client')->attempt(['username' => $request->username, 'password' => $request->password])) {
                // Jika login berhasil
                // return redirect()->back();
                return redirect ('dashboard');
            } else {
                // Jika login gagal
                return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
            }
        }
    }

    public function formRegister()
    {
        // Arahkan ke file user/register.blade.php
        return view('user.register');
    }

    public function register(Request $request)
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

        // Kirim link verifikasi email
        // $link = URL::temporarySignedRoute('pekat.verify', now()->addMinutes(30), ['id_client' => $data['id_client']]);
        
        // Mail::to($data['email'])->send(new VerifikasiEmailUntukRegistrasiPengaduanClient($data['nama'], $link));

        // Arahkan ke route pekat.index
        return redirect()->route('pekat.index');
    }

    public function logout()
    {
        // Fungsi logout dengan guard('client ')
        Auth::guard('client')->logout();

        // Arahkan ke route pekat.index
        return redirect()->route('dashboard');
    }

    public function storePengaduan(Request $request)
    {
        // return $request["nama_proyek"]; die;
        

        // Pengecekan jika tidak ada client yang sedang login
        if (!Auth::guard('client')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        // Masukkan semua data yg dikirim ke variable $data 
        $data = $request->all();
        $proyek = proyek::where('nama_proyek', $data["nama_proyek"])->first();
      

        // Buat variable $validate kemudian isinya Validator::make(datanya, [nama_field => peraturannya])
        $validate = Validator::make($data, [
            'nama_proyek' => ['required'],
            'isi_laporan' => ['required'],
            'tgl_kejadian' => ['required'],
            'foto'=>['required'],
        ]);

        // Pengecekan jika validate fails atau gagal
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Pengecekan jika ada file foto yang dikirim
        if ($request->file('foto')) {
            $imageName = time().'.'.$request->file('foto')->getClientOriginalExtension();

            $request->file('foto')->move(public_path('assets/pengaduan'), $imageName);
   
            // $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        // Set timezone waktu ke Asia/Bangkok
        date_default_timezone_set('Asia/Bangkok');

        // Membuat variable $pengaduan isinya Memasukkan data kedalam table Pengaduan
        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'id_client' => Auth::guard('client')->user()->id_client,
            'nama_proyek' => $data['nama_proyek'],
            'isi_laporan' => $data['isi_laporan'],
            'tgl_kejadian' => $data['tgl_kejadian'],
            // 'foto' => $data['foto'] ?? '',
            'foto' => $imageName,
            'kode_booking' => Str::random(8),
            'status' => '0',
            'id_proyek' => $proyek->id_proyek
        ]);



        // Pengecekan variable $pengaduan
        if ($pengaduan) {
            // Jika mengirim pengaduan berhasil
            return redirect()->route('user.laporan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            // Jika mengirim pengaduan gagal
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function dashboard()
    {
         // Membuat variable $terverifikasi isinya menghitung pengaduan status pending
         $terverifikasi = Pengaduan::where([['id_client', Auth::guard('client')->user()->id_client], ['status', '!=', '0']])->get()->count();
         // Membuat variable $terverifikasi isinya menghitung pengaduan status proses
         $proses = Pengaduan::where([['id_client', Auth::guard('client')->user()->id_client], ['status', 'proses']])->get()->count();
         // Membuat variable $terverifikasi isinya menghitung pengaduan status selesai
         $selesai = Pengaduan::where([['id_client', Auth::guard('client')->user()->id_client], ['status', 'selesai']])->get()->count();
 
         // Masukkan 3 variable diatas ke dalam variable array $hitung
         $hitung = [$terverifikasi, $proses, $selesai];

        

            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.dashboard', ['hitung' => $hitung]);

        
 
        

    }

    public function laporan($siapa = '')
    {
        if ($siapa == 'me') {
            // Jika $siapa isinya 'me'
            $pengaduan = Pengaduan::where('id_client', Auth::guard('client')->user()->id_client)->orderBy('tgl_pengaduan', 'asc')->get();

            $proyek=proyek::where('id_client', Auth::guard ('client')->user()->id_client)->get();
            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('User.laporansz', ['pengaduan' => $pengaduan, 'siapa' => $siapa, 'proyek'=> $proyek]);
        } else {
            // Jika $siapa kosong
            // $pengaduan = Pengaduan::where([['id_client', '!=', Auth::guard('client')->user()->id_client], ['status', '!=', '0']])->orderBy('tgl_pengaduan', 'desc')->get();
            $pengaduan = Pengaduan::where('id_client', Auth::guard('client')->user()->id_client)->orderBy('tgl_pengaduan', 'asc')->get();

            $proyek=proyek::where('id_client', Auth::guard ('client')->user()->id_client)->get();
            
            // $proyek=proyek::all();
            // // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.laporansz', ['pengaduan' => $pengaduan, 'siapa' => $siapa, 'proyek'=> $proyek]);
        }
    }

    public function keterangan()
    {
        
            // Jika siapa isinya 'me'
            $pengaduan = Pengaduan::where('id_client', Auth::guard('client')->user()->id_client)->orderBy('tgl_pengaduan', 'asc')->get();

            // $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.keterangan', ['pengaduan' => $pengaduan]);
    }


    public function cari(Request $request)
    

    {
        $pengaduan = Pengaduan::all();
            
            if ($request->keyword !=''){
                $pengaduan = Pengaduan::where('kode_booking','LIKE','%'.$request->keyword.'%')->get();
            }
            return response()->json(['employees'=> $pengaduan]);


    }



    public function show()
        {
            Pengaduan::where([['id_client', Auth::guard('client')->user()->id_client]])->get();
            return view('user.profil');

            // $client = pengaduan::where([['id_client',( Auth::guard('client')->user()->id_client)]])->get();
            // return view('user.profil',['client' => $client]);

        }


         // public function edit()
        // {
        //     Pengaduan::where([['id_client', Auth::guard('client')->user()->id_client]])->get();
        //     return view('user.editprofil');
        // }

        public function edit()
        {
            // Pengaduan::where([['id_client', Auth::guard('client')->user()->id_client]])->get();
            // return view('user.profil');

            $client = client::where('id_client', Auth::guard('client')->user()->id_client)->first();
  
            return view('user.editprofil', ['client'=>$client]);
        }
    

        public function update(Request $request)
        {
            $data = $request->all();
    
            $client = Client::find($data['id_client']);
    
            $client->update([
                'nama' => $data['nama'],
                'username' => $data['username'],
                'email'=>$data['email'],
                'password' => Hash::make($data['password']),
                'telp' => $data['telp'],
            ]);
    
            return redirect('/profil')->with(['status' => 'Berhasil Diupdate!']);
        }

        public function coba()
        {
            return view('user.coba');
        }

     



    
    
    

    
}