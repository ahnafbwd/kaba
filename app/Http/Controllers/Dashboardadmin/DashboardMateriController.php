<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Materi;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardMateriController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.materi.index',[
            'materis' => Materi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.materi.create');
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
            'nama_materi' => ['required', 'string'],
            'deskripsi_singkat' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'modul' => ['required', 'file'], // Ganti 'string' menjadi 'file'
        ]);

        if ($request->hasFile('modul')) {
            $file = $request->file('modul');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('modul', $fileName); // Simpan file ke folder 'modul'
        }

        $materi = Materi::create([
            'nama_materi' => $request->nama_materi,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi' => $request->deskripsi,
            'modul' => $filePath, // Simpan path file dalam database
        ]);
        return redirect('/admin/materi')->with('success','Materi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        return view('admin.dashboard.materi.show',[
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
        return view('admin.dashboard.materi.edit',[
            'materi' => $materi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'nama_materi' => ['required', 'string'],
            'deskripsi_singkat' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'modul' => ['nullable', 'file'],
        ]);

        $materi->nama_materi = $request->nama_materi;
        $materi->deskripsi_singkat = $request->deskripsi_singkat;
        $materi->deskripsi = $request->deskripsi;

        if ($request->hasFile('modul')) {
            $file = $request->file('modul');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('modul', $fileName);
            $materi->modul = $filePath;
        }

        $materi->save();

        return redirect('/admin/materi')->with('success', 'Materi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);
        return redirect('/admin/materi')->with('success','Materi berhasil dihapus');
    }

    public function download($kode_materi)
{
    $materi = Materi::where('kode_materi', $kode_materi)->first();

    if ($materi) {
        return response()->download(storage_path('app/' . $materi->modul));
    }

    return redirect('/admin/materi')->with('error', 'Materi tidak ditemukan');
}


}
