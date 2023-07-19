<?php

namespace App\Http\Controllers\Dashboarduser;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Presensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodeuser = Auth::guard('web')->user()->kode_user;

        // Cari data siswa berdasarkan kode_user
        $siswa = Siswa::where('kode_user', $kodeuser)->first();

        // Pastikan data siswa ada sebelum melanjutkan
            $kelas = $siswa->kelompok;


                // Ambil kode_kelas dari objek kelas
                $kodeKelas = $kelas->kode_kelas;

                // Ambil semua jadwal yang sesuai dengan kode_kelas
                $tanggalSaja = Carbon::now('Asia/Jakarta')->format('Y-m-d');
                $waktuSaja = Carbon::now('Asia/Jakarta')->format('H:i:s');
                $now = Carbon::now('Asia/Jakarta');

                // Ambil semua jadwal yang sesuai dengan kode_kelas
                $jadwal = Jadwal::where('kode_kelas', $kodeKelas)->get();

                // Ambil data absensi berdasarkan kriteria tanggal dan waktu
                $absensisaatini = Absensi::whereIn('kode_jadwal', $jadwal->pluck('kode_jadwal')->toArray())
                    ->whereDate('tanggal_absensi', $tanggalSaja)
                    ->whereTime('waktu_mulai', '<=', $waktuSaja)
                    ->whereTime('waktu_berakhir', '>=', $waktuSaja)
                    ->get()->first();
                // $absensiSelain = Absensi::whereDate('tanggal_absensi', '!=', $tanggalSaja)
                //     ->orWhere(function ($query) use ($now) {
                //         $query->where('waktu_mulai', '>', $now)
                //             ->orWhere('waktu_berakhir', '<', $now);
                //     })
                //     ->get();
                $absensiSelain = Absensi::whereIn('kode_jadwal', $jadwal->pluck('kode_jadwal')->toArray())
                    ->whereDate('tanggal_absensi', '!=', $tanggalSaja)
                    ->orWhere(function ($query) use ($now) {
                        $query->where('waktu_mulai', '>', $now)
                            ->orWhere('waktu_berakhir', '<', $now);
                    })
                    ->get();
                // dd($absensiSelain);

                // if (isset($absensisaatini) && $absensisaatini->isNotEmpty()) {
                //     // Data absensi dengan tanggal, waktu, dan kode_jadwal yang sesuai ditemukan
                //     // Lakukan tindakan yang diperlukan di sini

                // }

        return view('user.dashboard.kelas.absensi.index',compact('absensisaatini','absensiSelain'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$kodeabsensi)
    {
        $kodeuser = Auth::guard('web')->user()->kode_user;
        $siswa = Siswa::where('kode_user', $kodeuser)->first();
        $kodesiswa = $siswa->kode_siswa;
        $waktuSaja = Carbon::now('Asia/Jakarta')->format('H:i:s');
        // dd($siswa);
        try {
            Presensi::create([
                'kode_absensi' => $kodeabsensi,
                'kode_siswa' => $kodesiswa,
                'waktu_presensi' => $waktuSaja,
                'status_kehadiran' => $request->status_kehadiran,
                'keterangan' => $request->keterangan,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('/user/absensi')->with('success','Presebsi berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        $kodeuser = Auth::guard('web')->user()->kode_user;
        $siswa = Siswa::where('kode_user', $kodeuser)->first();
        $kodesiswa = $siswa->kode_siswa;
        $kodeabsensi = $absensi->kode_absensi;
        $sudah = Presensi::where('kode_absensi', $kodeabsensi)->where('kode_siswa', $kodesiswa)->first();
        if (!$sudah) {
            return view('user.dashboard.kelas.absensi.show',compact('absensi'));
        } else {
            return view('user.dashboard.kelas.absensi.sudah');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
