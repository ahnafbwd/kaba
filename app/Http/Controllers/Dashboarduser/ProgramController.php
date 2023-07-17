<?php

namespace App\Http\Controllers\Dashboarduser;


use App\Models\Jadwal;
use App\Models\Kelompok;
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

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('Tingkat','Materi','Jadwal')->get();
        return view('user.dashboard.program.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Program $program)
    {
        $program->load('tingkat', 'materi', 'jadwal');
        return view('user.dashboard.program.detail', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

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
    return view('user.dashboard.program.detail', compact('program'));
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
        return redirect('/admin/dashboard/program')->with('success','Program berhasil dihapus');
    }

//     public function konfirmasiPendaftaran(Program $program)
//     {
//         // $program->load('tingkat', 'materi', 'jadwal','kelompok');
//         // // $kodeprogram = $program->kode_program;
//         // // $kelompok = Kelompok::where('kode_program' , $kodeprogram)->first();
//         // // dd($kelompok);
//         // return view('user.dashboard.program.confirmation', compact('program'));

//     $program->load('tingkat', 'materi', 'jadwal', 'kelompoks'); // Mengubah 'kelompok' menjadi 'kelompoks'
//     return view('user.dashboard.program.confirmation', compact('program'));
//     }
//     public function getKelompokByKode($kodeKelas)
// {
//     $kelompok = Kelompok::where('kode_kelas', $kodeKelas)->first();
//     return response()->json($kelompok);
// }
// public function konfirmasiPendaftaran(Program $program)
// {
//     $program->load('tingkat', 'materi', 'jadwal', 'kelompoks'); // Update 'kelompok' to 'kelompoks'
//     return view('user.dashboard.program.confirmation', compact('program'));
// }
public function konfirmasiPendaftaran(Program $program)
{
    $program->load('tingkat', 'materi', 'jadwal', 'kelompoks');

    // Mendapatkan kelompok dengan status kelas aktif
    $kelompokAktif = $program->kelompoks()->where('status_kelas', 'Aktif')->get();

    return view('user.dashboard.program.confirmation', compact('program', 'kelompokAktif'));
}

public function getKelasByKode($kodeKelas)
{
    $kelompok = Kelompok::where('kode_kelas', $kodeKelas)->first();
    return response()->json($kelompok);
}


}
