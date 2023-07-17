<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Pengajaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::with('pengajaran.pengajar','pengajaran.materi', 'kelompok')->get();
        return view('admin.dashboard.jadwal.index', compact('jadwals'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengajarans = Pengajaran::all();
        $kelompoks = Kelompok::all();
        return view('admin.dashboard.jadwal.create',[
            "pengajarans" => $pengajarans,
            "kelompoks" => $kelompoks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kode_pengajaran' => ['required'],
            'kode_kelas' => ['required'],
            'ruangan' => ['required'],
        ];

        $validatedData = $request->validate($rules);

        $isExists = Jadwal::where([
            'kode_pengajaran' => $request->kode_pengajaran,
            'kode_kelas' => $request->kode_kelas,
            'ruangan' => $request->ruangan,
        ])->exists();


        if ($isExists) {
            return redirect('/admin/dashboard/jadwal')->with('error', 'Jadwal yang sama sudah ada.');
        }

        Jadwal::create($request->all());

        return redirect('/admin/dashboard/jadwal')->with('success','Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        $jadwal->load('pengajaran.pengajar', 'pengajaran.materi', 'kelompok', 'pengajaran.waktu');

    return view('admin.dashboard.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
{
    $pengajarans = Pengajaran::all();
    $kelompoks = Kelompok::all();

    return view('admin.dashboard.jadwal.edit', compact('jadwal', 'pengajarans', 'kelompoks'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $rules = [
            'kode_pengajaran' => ['required'],
            'kode_kelas' => ['required'],
            'ruangan' => ['required'],
        ];


        if ($request->kode_pengajaran != $jadwal->kode_pengajaran && $request->kode_pengajaran != $jadwal->kode_pengajaran) {
            $rules;
            // return redirect('/admin/dashboard/jadwal')->with('error', 'Pengajaran yang sama sudah ada.');
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $jadwal->update($validatedData);

        return redirect('/admin/dashboard/jadwal')->with('success', 'Kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);
        return redirect('/admin/dashboard/jadwal')->with('success','Pengajaran berhasil dihapus');
    }


}
