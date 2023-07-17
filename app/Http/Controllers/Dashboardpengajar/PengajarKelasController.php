<?php

namespace App\Http\Controllers\Dashboardpengajar;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Pengajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarKelasController extends Controller
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
        $kelompoks = $jadwals->pluck('kelompok')->unique(); // Menampilkan hanya satu entri per nama kelas
            return view('pengajar.dashboard.kelas.index',compact('jadwals','kelompoks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function show($kode_kelas)
    {
        $siswas = Siswa::where('kode_kelas', $kode_kelas)->get();
        $kelompok = Kelompok::where('kode_kelas', $kode_kelas)->first();
        // dd($siswas);
        return view('pengajar.dashboard.kelas.show', compact('kelompok','siswas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelompok $kelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelompok $kelompok)
    {
        //
    }
}
