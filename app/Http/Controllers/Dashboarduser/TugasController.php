<?php

namespace App\Http\Controllers\Dashboarduser;

use App\Models\Pengumpulan;
use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index()
{
    $kodeuser = Auth::guard('web')->user()->kode_user;
    $siswa = Siswa::where('kode_user', $kodeuser)->first();
    $kelas = $siswa->kelompok->kode_kelas;

    $tugases = Tugas::where('kode_kelas', $kelas)->get();
    $kode_tugases = $tugases->pluck('kode_tugas'); // Ambil array 'kode_tugas' dari $tugases

    // Gunakan 'whereIn' alih-alih 'where' untuk mencari Pengumpulan dengan multiple 'kode_tugas'
    $pengumpulans = Pengumpulan::whereIn('kode_tugas', $kode_tugases)->get();

    return view('user.dashboard.kelas.tugas.index', compact('tugases', 'pengumpulans'));
}


    public function create()
    {
        //
    }

    public function store(Request $request,$kodetugas)
    {
        $request->validate([
            'file_tugas' => ['required', 'file'], // Ganti 'string' menjadi 'file'
        ]);

        if ($request->hasFile('file_tugas')) {
            $file = $request->file('file_tugas');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('file_tugas', $fileName); // Simpan file ke folder 'modul'
        }
        $kodeuser = Auth::guard('web')->user()->kode_user;
        $siswa = Siswa::where('kode_user', $kodeuser)->first();
        $kodesiswa = $siswa->kode_siswa;
        try {
            Pengumpulan::create([
                'kode_tugas' => $kodetugas,
                'kode_siswa' => $kodesiswa,
                'keterangan' => $request->keterangan,
                'file_tugas' => $filePath,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('/user/tugas')->with('success','Tugas berhasil dikumpulkan');
    }


    public function show($kodetugas)
    {
        $tugas = Tugas::where('kode_tugas', $kodetugas)->first();
        $pengumpulan = Pengumpulan::where('kode_tugas', $kodetugas)->first();

        return view('user.dashboard.kelas.tugas.show',compact('tugas','pengumpulan'));
    }


    public function edit(Tugas $tugas)
    {
        //
    }


    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    public function destroy(Tugas $tugas)
    {
        //
    }
    public function download($kode_tugas)
{
    $tugas = Pengumpulan::where('kode_tugas', $kode_tugas)->first();

    // dd( $tugas);
    if ($tugas) {
        return response()->download(storage_path('app/' . $tugas->file_tugas));
    }

    return redirect('/user/tugas/'. $kode_tugas)->with('error', 'Tugas tidak ditemukan');
}
}
