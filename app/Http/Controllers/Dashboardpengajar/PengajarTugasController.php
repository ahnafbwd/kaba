<?php

namespace App\Http\Controllers\Dashboardpengajar;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pengajaran;
use App\Models\Pengumpulan;
use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
        $tugases = Tugas::where('kode_pengajar', $kodepengajar)->get();
        return view('pengajar.dashboard.tugas.index',compact('tugases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
        $pengajarans = Pengajaran::where('kode_pengajar', $kodepengajar)->get();
        $jadwals = Jadwal::whereIn('kode_pengajaran', $pengajarans->pluck('kode_pengajaran')->toArray())->get();
        $materine = Pengajaran::whereIn('kode_pengajaran', $pengajarans->pluck('kode_pengajaran')->toArray())->get();
        $kelompoks = $jadwals->pluck('kelompok')->unique();
        $materis = $materine->pluck('materi')->unique();
        return view('pengajar.dashboard.tugas.create',compact('kelompoks','materis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;

        $request->validate([
            'kode_kelas' => ['required'],
            'kode_materi' => ['required'],
            'nama_tugas' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'keterangan' => ['string'],
            'tanggal_pengumpulan' => ['required', 'date'],
        ]);

        $tugas = Tugas::create([
            'kode_kelas' => $request->kode_kelas,
            'kode_materi'  => $request->kode_materi,
            'kode_pengajar'  => $kodepengajar,
            'nama_tugas'  => $request->nama_tugas,
            'deskripsi'  => $request->deskripsi,
            'keterangan'  => $request->keterangan,
            'tanggal_pengumpulan'  => $request->tanggal_pengumpulan,
        ]);

        return redirect('/pengajar/tugas')->with('success','Tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    // public function show($kodetugas)
    // {
    //     $tugas = Tugas::where('kode_tugas', $kodetugas)->first();
    //     $pengumpulans = Pengumpulan::where('kode_tugas', $tugas->kode_tugas)->get();
    //     return view('pengajar.dashboard.tugas.show',compact('tugas'));
    // }
    public function show($kodetugas)
{
    $tugas = Tugas::where('kode_tugas', $kodetugas)->first();

    $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
    $pengajarans = Pengajaran::where('kode_pengajar', $kodepengajar)->get();
    $jadwals = Jadwal::whereIn('kode_pengajaran', $pengajarans->pluck('kode_pengajaran')->toArray())->get();
    $materine = Pengajaran::whereIn('kode_pengajaran', $pengajarans->pluck('kode_pengajaran')->toArray())->get();
    $kelompoks = $jadwals->pluck('kelompok')->unique();
    $kodekelas = $tugas->kode_kelas;
    // dd($kodekelas);
    $materis = $materine->pluck('materi')->unique();

    $pengumpulans = Pengumpulan::where('kode_tugas', $kodetugas)->get();
    // dd($pengumpulans);

    // Mengambil daftar siswa yang belum dan sudah mengerjakan tugas
    $siswaBelumMengerjakan = Siswa::whereDoesntHave('pengumpulan', function ($query) use ($kodetugas,$kodekelas) {
        $query->where('kode_tugas', $kodetugas)->where('kode_kelas', $kodekelas);
    })->get();

    $siswaSudahMengerjakan = Siswa::whereHas('pengumpulan', function ($query) use ($kodetugas,$kodekelas) {
        $query->where('kode_tugas', $kodetugas)->where('kode_kelas', $kodekelas);
    })->get();

    // dd($siswaSudahMengerjakan);
    return view('pengajar.dashboard.tugas.show', compact('tugas', 'pengumpulans','kelompoks', 'materis', 'siswaBelumMengerjakan', 'siswaSudahMengerjakan'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit($kodetugas)
    {
        $tugas = Tugas::where('kode_tugas', $kodetugas)->first();
        // dd($tugas);
        $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
        $pengajarans = Pengajaran::where('kode_pengajar', $kodepengajar)->get();
        $jadwals = Jadwal::whereIn('kode_pengajaran', $pengajarans->pluck('kode_pengajaran')->toArray())->get();
        $materine = Pengajaran::whereIn('kode_pengajaran', $pengajarans->pluck('kode_pengajaran')->toArray())->get();
        $kelompoks = $jadwals->pluck('kelompok')->unique();
        $materis = $materine->pluck('materi')->unique();
        return view('pengajar.dashboard.tugas.edit',compact('tugas','kelompoks','materis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kodetugas)
    {
        $tugas = Tugas::where('kode_tugas', $kodetugas)->first();
        // dd($tugas);
        $validatedData = $request->validate([
            'nama_tugas' => 'required|max:255',
            'kode_kelas' => 'required',
            'kode_materi' => 'required',
            'tanggal_pengumpulan' => 'required|date',
            'deskripsi' => 'required',
            'keterangan' => 'required',
        ]);
        $tugas->update($validatedData);
        return redirect('/pengajar/tugas')->with('success', "Tugas berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($kodetugas)
{
    $tugas = Tugas::where('kode_tugas', $kodetugas)->first();

    if (!$tugas) {
        return redirect('/pengajar/tugas')->with('error', "Tugas not found.");
    }

    $tugas->delete();

    return redirect('/pengajar/tugas')->with('success', "Tugas berhasil dihapus");
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
