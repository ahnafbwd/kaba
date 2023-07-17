<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Materi;
use App\Models\Pengajar;
use App\Models\Pengajaran;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;

class DashboardPengajaranController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.pengajaran.index',[
            'pengajarans' => Pengajaran::all(),
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

         $isExists = Pengajaran::where([
             'kode_materi' => $request->kode_materi,
             'kode_pengajar' => $request->kode_pengajar,
             'hari' => $request->hari,
             'kode_waktu' => $request->kode_waktu,
         ])->exists();

         if ($isExists) {
             return redirect('/admin/dashboard/pengajaran')->with('error', 'Pengajaran yang sama sudah ada.');
         }

         Pengajaran::create($request->all());

         return redirect('/admin/dashboard/pengajaran')->with('success', 'Pengajaran berhasil ditambahkan');
     }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajaran  $pengajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajaran $pengajaran)
    {
        return view('admin.dashboard.pengajaran.show',[
            'pengajaran' => $pengajaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajaran  $pengajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajaran $pengajaran)
    {
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $waktu = Waktu::all();

        return view('admin.dashboard.pengajaran.edit',[
            'pengajaran' => $pengajaran,
            'materis' => $materi,
            'pengajars' => $pengajar,
            'waktus' => $waktu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajaran  $pengajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajaran $pengajaran)
    {
        $rules = [
            'kode_materi' => 'required',
            'kode_pengajar' => 'required',
            'hari' => 'required',
            'kode_waktu' => 'required',
            'status_pengajaran' => 'required',
        ];

        // Periksa apakah email berubah
        if ($request->kode_materi != $pengajaran->kode_materi && $request->kode_pengajar != $pengajaran->kode_pengajar && $request->hari != $pengajaran->hari && $request->kode_waktu != $pengajaran->kode_waktu && $request->status_pengajaran != $pengajaran->status_pengajaran) {
            $rules;
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $pengajaran->update($validatedData);

        return redirect('/admin/dashboard/pengajaran')->with('success', 'Data Pengajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajaran  $pengajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajaran $pengajaran)
    {
        Pengajaran::destroy($pengajaran->id);
        return redirect('/admin/dashboard/pengajaran')->with('success','Pengajaran berhasil dihapus');
    }
}
