<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Angkatan;
use App\Models\Kelompok;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompoks = Kelompok::with('angkatan', 'program')->get();

        return view('admin.dashboard.kelompok.index', compact('kelompoks'));
        // return view('admin.dashboard.kelompok.index',[
        //     'kelompoks' => Kelompok::all(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        $angkatans = Angkatan::all();
        return view('admin.dashboard.kelompok.create',[
            "programs" => $programs,
            "angkatans" => $angkatans,
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
            'kode_program' => ['required'],
            'kode_angkatan' => ['required'],
            'nama_kelas' => ['required','unique:kelompoks'],
            'deskripsi' => ['required'],
            'link_wa' => ['required'],
            'jumlah_siswa' => ['required'],
        ]);

        $kelompok = Kelompok::create([
            'kode_program' => $request->kode_program,
            'kode_angkatan' => $request->kode_angkatan,
            'nama_kelas' => $request->nama_kelas,
            'deskripsi' => $request->deskripsi,
            'link_wa' => $request->link_wa,
            'jumlah_siswa' => $request->jumlah_siswa,
        ]);

        return redirect('/admin/dashboard/kelompok')->with('success','Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kelompok $kelompok)
    {
        $angkatan = $kelompok->angkatan;
        $program = $kelompok->program;
        // dd($program);
        return view('admin.dashboard.kelompok.show',compact(
            'kelompok',
            'angkatan',
            'program'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelompok $kelompok)
    {
        $programs = Program::all();
        $angkatans = Angkatan::all();
        return view('admin.dashboard.kelompok.edit',[
            'kelompok' => $kelompok,
            'programs' => $programs,
            'angkatans' => $angkatans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        $rules = [
            'kode_program' => ['required'],
            'kode_angkatan' => ['required'],
            'nama_kelas' => ['required'],
            'deskripsi' => ['required'],
            'jumlah_siswa' => ['required'],
            'link_wa' => ['required'],
            'status_kelas' => ['required'],
        ];

        // Periksa apakah email berubah
        if ($request->nama_kelas != $kelompok->nama_kelas) {
            $rules['nama_kelas'][] = 'unique:kelompoks';
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $kelompok->update($validatedData);

        return redirect('/admin/dashboard/kelompok')->with('success', 'Kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelompok $kelompok)
    {
        Kelompok::destroy($kelompok->id);
        return redirect('/admin/dashboard/kelompok')->with('success','Kelas berhasil dihapus');
    }
}
