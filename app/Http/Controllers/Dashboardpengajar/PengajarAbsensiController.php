<?php

namespace App\Http\Controllers\Dashboardpengajar;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Pengajaran;
use App\Models\Presensi;
use App\Models\Siswa;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
        $pengajaran = Pengajaran::where('kode_pengajar', $kodepengajar)->get();
        $jadwals = Jadwal::whereIn('kode_pengajaran', $pengajaran->pluck('kode_pengajaran')->toArray())->get();
        $absensis = Absensi::whereIn('kode_jadwal', $jadwals->pluck('kode_jadwal')->toArray())->get();
        // dd($absensis);
        return view('pengajar.dashboard.absensi.index',compact('absensis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
        $pengajaran = Pengajaran::where('kode_pengajar', $kodepengajar)->get();
        $jadwals = Jadwal::whereIn('kode_pengajaran', $pengajaran->pluck('kode_pengajaran')->toArray())->get();
        $waktus = Waktu::whereIn('kode_waktu', $pengajaran->pluck('kode_waktu')->toArray())->get();
        // dd($absensis);
        return view('pengajar.dashboard.absensi.create',compact('jadwals','waktus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kode_jadwal' => ['required'],
            'waktu_mulai' => ['required'],
            'waktu_berakhir' => ['required'],
            'tanggal_absensi' => ['required', 'date'],
            'keterangan' => ['string'],
        ]);
            // Konstruksi format waktu yang sesuai
    $waktuMulaiFormatted = date('H:i:s', strtotime($request->waktu_mulai));
    $waktuBerakhirFormatted = date('H:i:s', strtotime($request->waktu_berakhir));

        $absensi = Absensi::create([
            'kode_jadwal' => $request->kode_jadwal,
            'waktu_mulai'  => $waktuMulaiFormatted,
            'waktu_berakhir'  => $waktuBerakhirFormatted,
            'tanggal_absensi'  => $request->tanggal_absensi,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect('/pengajar/absensi')->with('success','Absensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
{
    $kodeabsensi = $absensi->kode_absensi;
    $kodejadwal = $absensi->kode_jadwal;
    $kodekelas = $absensi->jadwal->kelompok->kode_kelas;
    $absensi->load('jadwal.kelompok', 'jadwal.pengajaran');
    $presensis = Presensi::where('kode_absensi', $kodeabsensi)->get();
    // Mengambil daftar siswa yang belum dan sudah melakukan presensi berdasarkan kode kelas
    $siswaBelumAbsen = Siswa::whereDoesntHave('presensi', function ($query) use ($kodeabsensi, $kodejadwal) {
        $query->where('kode_absensi', $kodeabsensi);
    })->where('kode_kelas', $kodekelas)->get();
    $siswaSudahAbsen = Siswa::whereHas('presensi', function ($query) use ($kodeabsensi, $kodejadwal) {
        $query->where('kode_absensi', $kodeabsensi);
    })->where('kode_kelas', $kodekelas)->get();

    return view('pengajar.dashboard.absensi.show', compact('absensi','presensis','siswaBelumAbsen','siswaSudahAbsen'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
