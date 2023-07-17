<?php

namespace App\Http\Controllers\Dashboardpengajar;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pengajaran;
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
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        //
    }
}
