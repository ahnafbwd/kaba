<?php

namespace App\Http\Controllers\Dashboarduser;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $kodeUser = Auth::guard('web')->user()->kode_user;
    //     $datasiswa = Siswa::where('kode_user', $kodeUser)->first();

    //     if (!$datasiswa) {
    //         // Tidak ada data pendaftaran, tampilkan tampilan gagal atau pesan yang sesuai
    //         return view('user.dashboard.kelas.kosong');
    //     } else {
    //         $siswae = Siswa::where('kode_user', $kodeUser)->first()->get();
    //         $siswae->load('pendaftaran', 'kelompok');
    //         return view('user.dashboard.kelas.index', [
    //             'siswa' => $siswae,
    //         ]);
    //     }
    // }
    public function index()
{
    $kodeUser = Auth::guard('web')->user()->kode_user;
    $siswa = Siswa::where('kode_user', $kodeUser)->with('pendaftaran', 'kelompok')->first();
    $waktuAkses = date('Y-m-d H:i:s'); // buat ngambil waktu
    if (!$siswa) {
        // Tidak ada data siswa, tampilkan tampilan kosong
        return view('user.dashboard.kelas.kosong');
    } else {
        return view('user.dashboard.kelas.index', compact('siswa'));
    }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
