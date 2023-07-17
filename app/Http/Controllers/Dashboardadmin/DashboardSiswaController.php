<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Kelompok;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DashboardSiswaController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.siswa.index',[
            'siswas' => Siswa::all(),
        ]);
    }


    public function create()
    {
        $pendaftaran = Pendaftaran::all();
        $user = User::all();
        $kelompok = Kelompok::all();
        return view('admin.dashboard.siswa.create',[
            'pendaftarans' => $pendaftaran,
            'users' => $user,
            'kelompoks' => $kelompok,
        ]);
    }


    public function store(Request $request)
{
    $rules = [
        'kode_user' => 'required',
        'kode_pendaftaran' => 'required',
        'kode_kelas' => 'required',
        'status_siswa' => 'required',
        'tanggal_masuk' => 'required',
        'tanggal_lulus' => 'nullable',
    ];

    $validatedData = $request->validate($rules);

    // Simpan data siswa baru
    $siswa = Siswa::create($validatedData);

    return redirect('/admin/dashboard/siswa')->with('success', 'Data Siswa berhasil disimpan');
}



    public function show(Siswa $siswa)
    {
        return view('admin.dashboard.siswa.show',[
            'siswa' => $siswa
        ]);
    }


    public function edit(Siswa $siswa)
    {
        $pendaftaran = Pendaftaran::all();
        $user = User::all();
        $kelompok = Kelompok::all();
        return view('admin.dashboard.siswa.edit',[
            'siswa' => $siswa,
            'pendaftarans' => $pendaftaran,
            'users' => $user,
            'kelompoks' => $kelompok,
        ]);
    }


    public function update(Request $request, Siswa $siswa)
    {
        $rules = [
            'kode_user' => 'required',
            'kode_pendaftaran' => 'required',
            'kode_kelas' => 'required',
            'status_siswa' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_lulus' => 'nullable',
        ];

        if ($request->kode_pendaftaran != $siswa->kode_pendaftaran) {
            $rules;
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $siswa->update($validatedData);

        return redirect('/admin/dashboard/siswa')->with('success', 'Data Siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        return redirect('/admin/dashboard/siswa')->with('success','Siswa berhasil dihapus');
    }
}
