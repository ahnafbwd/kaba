<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Pengajar;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardPengajarController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.pengajar.index',[
            'pengajars' => Pengajar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Pengajar::class],
            'nomer_telepon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pengajar = Pengajar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomer_telepon' => $request->nomer_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/pengajar')->with('success','Pengajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajar $pengajar)
    {
        return view('admin.dashboard.pengajar.show',[
            'pengajar' => $pengajar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajar $pengajar)
    {
        return view('admin.dashboard.pengajar.edit',[
            'pengajar' => $pengajar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajar $pengajar)
    {
        $rules = [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nomer_telepon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'status_kerja' => ['required', 'in:Tidak Aktif,Aktif'],
        ];

        // Periksa apakah email berubah
        if ($request->email != $pengajar->email) {
            $rules['email'][] = 'unique:pengajars';
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $pengajar->update($validatedData);

        return redirect('/admin/pengajar')->with('success', 'Data pengguna berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajar $pengajar)
    {
        Pengajar::destroy($pengajar->id);
        return redirect('/admin/pengajar')->with('success','Pengajar berhasil dihapus');
    }
}
