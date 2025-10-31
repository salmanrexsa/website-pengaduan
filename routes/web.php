<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\KaryawaneditController;
use App\Http\Controllers\Admin\TanggapanController;
Use App\Http\Controllers\Admin\ProyekController;
use App\Http\Controllers\User\EmailController;
use App\Http\Controllers\User\SocialController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CariController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('pekat.index');

Route::get('/login', [UserController::class, 'loginsik'])->name('loginsik');

Route::post('/masyarakat/sendverification', [EmailController::class, 'sendVerification'])->name('pekat.sendVerification');
Route::get('/masyarakat/verify/{id_client}', [EmailController::class, 'verify'])->name('pekat.verify');

Route::middleware(['isClient'])->group(function () {
    // Pengaduan
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
    Route::get('/user.laporan', [UserController::class, 'laporan'])->name('user.laporan');
    Route::get('keterangan', [UserController::class, 'keterangan'])->name('keterangan');
    Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [UserController::class, 'show'])->name('profil');
    Route::get('/editprofil', [UserController::class, 'edit'])->name('editprofil');
    Route::post('/updateprofil', [UserController::class, 'update'])->name('updateprofil');
    route::get('/coba', [UserController::class, 'coba'])->name('coba');
    


    

    // Logout client
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');
});

Route::middleware(['guest'])->group(function () {
    // Login client
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');

    // Register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');

    // Media Sosial
    Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('pekat.auth');
    Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);


    // Pencarian Kode
    
    Route::get('/cari',[CariController::class, 'cari'])->name('cari');
    route::get('/golekikode',[CariController::class, 'golekiKode'])->name('golekikode');
});

Route::prefix('admin')->group(function () {

    Route::middleware(['isAdmin'])->group(function () {
        // Petugas
        Route::resource('karyawan', KaryawanController::class);
        // route::resource('karyawanedit', KaryawaneditController::class);

        // Client
        Route::resource('client', ClientController::class);

        // Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
   
        // Proyek
        Route::resource('proyek', ProyekController::class);
   
    });

    Route::middleware(['isKaryawan'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Pengaduan
        Route::resource('pengaduan', PengaduanController::class);

        // Taanggapan
        Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');

        // Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
});
