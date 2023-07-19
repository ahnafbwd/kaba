<?php

namespace App\Http\Controllers\Dashboardpengajar;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PengajarPengumpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumpulan $pengumpulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumpulan $pengumpulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kodetugas ,$kodepengumpulan)
    {
        $pengumpulan = Pengumpulan::where('kode_pengumpulan', $kodepengumpulan)->get()->first();
        // dd($pengumpulan);
         // Validate the submitted grade
    $validatedData = $request->validate([
        'nilai' => ['required', 'numeric', 'min:0', 'max:100'],
    ]);

    // Update the grade
    $pengumpulan->update($validatedData);

    return redirect('/pengajar/tugas/'. $kodetugas)->with('success', "Nilai berhasil ditambahkan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function destroy($kodetugas ,$kodepengumpulan)
{
    $pengumpulan = Pengumpulan::where('kode_pengumpulan', $kodepengumpulan)->first();

    if (!$pengumpulan) {
        return redirect('/pengajar/tugas/'.$kodetugas)->with('error', "Tugas not found.");
    }

    $pengumpulan->delete();

    return redirect('/pengajar/tugas/'.$kodetugas)->with('success', "Tugas berhasil dihapus");
}
}
