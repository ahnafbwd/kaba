<?php

namespace App\Http\Controllers\Dashboardpengajar;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Pengajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarMateriController extends Controller
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
        $materis = $pengajaran->pluck('materi')->unique(); // Menampilkan hanya satu entri per nama kelas
        return view('pengajar.dashboard.materi.index',compact('materis'));
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
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        return view('pengajar.dashboard.materi.show',[
            'materi' => $materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        //
    }
}
