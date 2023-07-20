<?php

use App\Http\Controllers\Dashboardpengajar\PengajarPengumpulanController;
use App\Http\Controllers\Dashboarduser\AbsensiController;
use App\Http\Controllers\Dashboarduser\TugasController;
use App\Http\Controllers\Dashboardadmin\DashboardAdminController;
use App\Http\Controllers\Dashboardadmin\DashboardAngkatanController;
use App\Http\Controllers\Dashboardadmin\DashboardJadwalController;
use App\Http\Controllers\Dashboardadmin\DashboardKelompokController;
use App\Http\Controllers\Dashboardadmin\DashboardMateriController;
use App\Http\Controllers\Dashboardadmin\DashboardPendaftaranController;
use App\Http\Controllers\Dashboardadmin\DashboardPengajaranController;
use App\Http\Controllers\Dashboardadmin\DashboardPengajarController;
use App\Http\Controllers\Dashboardadmin\DashboardProgramController;
use App\Http\Controllers\Dashboardadmin\DashboardSiswaController;
use App\Http\Controllers\Dashboardadmin\DashboardTingkatController;
use App\Http\Controllers\Dashboardadmin\DashboardUserController;
use App\Http\Controllers\Dashboardadmin\DashboardWaktuController;
use App\Http\Controllers\Dashboardpengajar\PengajarAbsensiController;
use App\Http\Controllers\Dashboardpengajar\PengajarJadwalController;
use App\Http\Controllers\Dashboardpengajar\PengajarKelasController;
use App\Http\Controllers\Dashboardpengajar\PengajarMateriController;
use App\Http\Controllers\Dashboardpengajar\PengajarTugasController;
use App\Http\Controllers\Dashboarduser\JadwalController;
use App\Http\Controllers\Dashboarduser\KelasController;
use App\Http\Controllers\Dashboarduser\MateriController;
use App\Http\Controllers\Dashboarduser\PendaftaranController;
use App\Http\Controllers\Dashboarduser\ProgramController;
use App\Http\Controllers\Homepage\ContactController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\Homepage\ProgramController as programhome;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('homepage.about');
});
Route::get('/contact', function () {
    return view('homepage.contact');
});
Route::resource('/program', programhome::class)->names('program.home');

Route::post('/forms/contact', [ContactController::class, 'submitForm'])->name('contact.submit');


Route::get('/admin/dashboard/index', function () {
    return view('admin.dashboard.tes');
});

Route::get('/user/dashboard', function () {
    return view('user.dashboard.index');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'userdashboard'])->name('user.dashboard');
    Route::resource('/user/kelas', KelasController::class);
    Route::resource('/user/materi', MateriController::class);
    Route::get('/user/materi/{kode_materi}/download', [MateriController::class, 'download'])->name('modul.download');
    Route::resource('/user/program', ProgramController::class);
    Route::resource('/user/pendaftaran', PendaftaranController::class);
    Route::put('/user/pendaftaran/{pendaftaran}/update-kelompok', [PendaftaranController::class,'updateKelompok'])->name('pendaftaran.updateKelompok');
    // Route::post('/user/pendaftaran/midtrans-callback', [PendaftaranController::class,'callback']);
    Route::get('/user/program/{program}/konfirmasi-pendaftaran', [ProgramController::class, 'konfirmasiPendaftaran'])->name('program.konfirmasi');
    Route::get('/user/program/konfirmasi-pendaftaran/{kode_kelas}', [ProgramController::class, 'getKelasByKode']);
    Route::resource('/user/jadwal', JadwalController::class);
    Route::resource('/user/tugas', TugasController::class);
    Route::post('/user/tugas/{kode_tugas}', [TugasController::class, 'store'])->name('tugasupload.store');
    Route::get('/user/tugas/{kode_tugas}/download', [TugasController::class, 'download'])->name('tugasdownload.download');
    Route::resource('/user/absensi', AbsensiController::class);
    Route::post('/user/absensi/{kodeabsensi}', [AbsensiController::class, 'store'])->name('presensiuser.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::resource('/admin/user', DashboardUserController::class)->names('admin.user');
    Route::resource('/admin/pengajar', DashboardPengajarController::class)->names('admin.pengajar');
    Route::resource('/admin/manager', DashboardAdminController::class);
    Route::resource('/admin/angkatan', DashboardAngkatanController::class)->names('admin.angkatan');
    Route::resource('/admin/tingkat', DashboardTingkatController::class)->names('admin.tingkat');
    Route::resource('/admin/kelompok', DashboardKelompokController::class)->names('admin.kelompok');
    Route::resource('/admin/program', DashboardProgramController::class)->names('admin.program');
    Route::resource('/admin/materi', DashboardMateriController::class)->names('admin.materi');
    Route::get('/admin/materi/{kode_materi}/download', [DashboardMateriController::class, 'download'])->name('materi.download');
    Route::resource('/admin/waktu', DashboardWaktuController::class)->names('admin.waktu');
    Route::resource('/admin/kurikulum', DashboardPengajaranController::class)->names('admin.pengajaran');
    Route::resource('/admin/pendaftaran', DashboardPendaftaranController::class)->names('admin.pendaftaran');
    Route::resource('/admin/jadwal', DashboardJadwalController::class)->names('admin.jadwal');
    Route::resource('/admin/siswa', DashboardSiswaController::class)->names('admin.siswa');
    Route::get('/admin/profile', [ProfileController::class, 'editadmin'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'updateadmin'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroyadmin'])->name('admin.profile.destroy');
});

require __DIR__.'/adminauth.php';

//pengajar

Route::get('/pengajar/dashboard', function () {
    return view('pengajar.dashboard.index');
})->middleware(['auth:pengajar', 'verified'])->name('pengajar.dashboard');

Route::middleware('auth:pengajar')->group(function () {
    Route::resource('/pengajar/jadwal', PengajarJadwalController::class)->names('pengajar.jadwal');
    Route::resource('/pengajar/absensi', PengajarAbsensiController::class)->names('pengajar.absensi');
    Route::resource('/pengajar/tugas', PengajarTugasController::class)->names('pengajar.tugas');
    Route::resource('/pengajar/materi', PengajarMateriController::class)->names('pengajar.materi');
    Route::resource('/pengajar/kelas', PengajarKelasController::class)->names('pengajar.kelompok');
    Route::patch('/pengajar/tugas/{kodetugas}/pengumpulan/{kodepengumpulan}/nilai', [PengajarPengumpulanController::class, 'update'])->name('pengajartugasnilai.nilai');
    Route::delete('/pengajar/tugas/{kodetugas}/pengumpulan/{kodepengumpulan}/delete', [PengajarPengumpulanController::class, 'destroy'])->name('pengajarpengumpulanhapus.hapus');
    Route::get('/pengajar/tugas/{kode_tugas}/download', [PengajarTugasController::class, 'download'])->name('pengajartugasdownload.download');
    Route::get('/pengajar/profile', [ProfileController::class, 'editpengajar'])->name('pengajar.profile.edit');
    Route::patch('/pengajar/profile', [ProfileController::class, 'updatepengajar'])->name('pengajar.profile.update');
    Route::delete('/pengajar/profile', [ProfileController::class, 'destroypengajar'])->name('pengajar.profile.destroy');
});

require __DIR__.'/pengajarauth.php';
