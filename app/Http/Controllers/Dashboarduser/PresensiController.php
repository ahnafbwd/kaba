<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Http\Requests\StorePresensiRequest;
use App\Http\Requests\UpdatePresensiRequest;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodeuser = Auth::guard('web')->user()->kode_user;
        $siswa = Siswa::where('kode_user', $kodeuser)->first();
        $kodesiswa = $siswa->kode_siswa;
        $presensis = Presensi::where('kode_siswa', $kodesiswa)->first();
        return view('user.dashboard.kelas.absensi.semua',compact('presensis'));
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
     * @param  \App\Http\Requests\StorePresensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresensiRequest  $request
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresensiRequest $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
}
