<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Pengajar;
use App\Models\Program;
use App\Models\Tingkat;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardProgramController extends Controller
{

    public function index()
    {
        $programs = Program::with('Tingkat','Materi','Jadwal')->get();
        return view('admin.dashboard.program.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tingkatOptions = Tingkat::all();
        // $jadwalOptions = Jadwal::pluck('nama', 'id');
        $materiOptions = Materi::all();
        $jadwals = Jadwal::all();
        return view('admin.dashboard.program.create',[
            'tingkats' => $tingkatOptions,
            'materis' => $materiOptions,
            'jadwals' => $jadwals,
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
    $request->validate([
        'kode_tingkat' => ['required'],
        'nama_program' => ['required'],
        'deskripsi_singkat' => ['required'],
        'deskripsi' => ['required'],
        'harga' => ['required', 'numeric'],
        'kode_jadwal' => ['required'],
        'kode_materi' => ['required'],
        'kuota_siswa' => ['required'],
    ]);

    $program = new Program;
    $program->kode_tingkat = $request->input('kode_tingkat');
    $program->nama_program = $request->input('nama_program');
    $program->deskripsi_singkat = $request->input('deskripsi_singkat');
    $program->deskripsi = $request->input('deskripsi');
    $program->harga = $request->input('harga');
    $program->kode_jadwal = $request->input('kode_jadwal');

    // Mengubah string menjadi array
    $kodeMateri = implode(',', $request->input('kode_materi'));
    $program->kode_materi = $kodeMateri;

    $program->kuota_siswa = $request->input('kuota_siswa');

    $program->save();

    return redirect('/admin/program')->with('success', 'Program berhasil ditambahkan');
}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
{
    $program->load('tingkat', 'materi', 'jadwal');
    return view('admin.dashboard.program.show', compact('program'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $tingkatOptions = Tingkat::all();
        $materiOptions = Materi::all();
        $jadwals = Jadwal::all();
        $selectedMateris = explode(',', $program->kode_materi);
        return view('admin.dashboard.program.edit',[
            'program' => $program,
            'tingkats' => $tingkatOptions,
            'jadwals' => $jadwals,
            'materis' => $materiOptions,
            'selectedMateris' => $selectedMateris,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $rules = [
            'kode_tingkat' => ['required'],
            'nama_program' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'kode_jadwal' => ['required'],
            'kode_materi' => ['required'],
            'kuota_siswa' => ['required', 'integer'],
            'status_program' => ['required', 'in:Tidak Aktif,Aktif'],
        ];

        // Periksa apakah email berubah
        if ($request->nama_program != $program->nama_program) {
            $rules['nama_program'][] = 'unique:programs';
        }

        $validatedData = $request->validate($rules);
        // Ubah kode_materi menjadi string terpisah dengan koma
        $validatedData['kode_materi'] = implode(',', $validatedData['kode_materi']);

        // Update data pengguna
        $program->update($validatedData);

        return redirect('/admin/program')->with('success', 'Data Program berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        Program::destroy($program->id);
        return redirect('/admin/program')->with('success','Program berhasil dihapus');
    }
}
