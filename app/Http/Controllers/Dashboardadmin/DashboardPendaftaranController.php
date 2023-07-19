<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.pendaftaran.index',[
            'pendaftarans' => Pendaftaran::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $waktu = Waktu::all();
        return view('admin.dashboard.pengajaran.create',[
            'pengajars' => $pengajar,
            'materis' => $materi,
            'waktus' => $waktu,
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
             'kode_materi' => 'required',
             'kode_pengajar' => 'required',
             'hari' => 'required',
             'kode_waktu' => 'required',
         ];

         $validatedData = $request->validate($rules);

         $isExists = Pendaftaran::where([
             'kode_materi' => $request->kode_materi,
             'kode_pengajar' => $request->kode_pengajar,
             'hari' => $request->hari,
             'kode_waktu' => $request->kode_waktu,
         ])->exists();

         if ($isExists) {
             return redirect('/admin/kurikulum')->with('error', 'Pengajaran yang sama sudah ada.');
         }

         Pendaftaran::create($request->all());

         return redirect('/admin/pendaftaran')->with('success', 'Pengajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return view('admin.dashboard.pendaftaran.show',[
            'pendaftaran' => $pendaftaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $waktu = Waktu::all();

        return view('admin.dashboard.pendaftaran.edit',[
            'pengajaran' => $pendaftaran,
            'materis' => $materi,
            'pengajars' => $pengajar,
            'waktus' => $waktu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $rules = [
            'kode_materi' => 'required',
            'kode_pengajar' => 'required',
            'hari' => 'required',
            'kode_waktu' => 'required',
            'status_pengajaran' => 'required',
        ];

        // Periksa apakah email berubah
        if ($request->kode_materi != $pendaftaran->kode_materi && $request->kode_pengajar != $pendaftaran->kode_pengajar && $request->hari != $pendaftaran->hari && $request->kode_waktu != $pendaftaran->kode_waktu && $request->status_pengajaran != $pendaftaran->status_pengajaran) {
            $rules;
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $pendaftaran->update($validatedData);

        return redirect('/admin/kurikulum')->with('success', 'Data Pengajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        Pendaftaran::destroy($pendaftaran->id);
        return redirect('/admin/kurikulum')->with('success','Pengajaran berhasil dihapus');
    }
}
