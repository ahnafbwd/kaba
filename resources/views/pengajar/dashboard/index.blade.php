@php
    $kodepengajar = Auth::guard('pengajar')->user()->kode_pengajar;
    $pengajaran = \App\Models\Pengajaran::where('kode_pengajar', $kodepengajar)->get();
    $jadwals = \App\Models\Jadwal::whereIn('kode_pengajaran', $pengajaran->pluck('kode_pengajaran')->toArray())->get();
@endphp

@extends('pengajar.dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="col card bg-primary">
                <div class="card-body">
                    <p class="card-title text-white">Selamat Datang, Ustazd {{ Auth::guard('pengajar')->user()->nama_lengkap }}</p>
                    <h3 class="h5 font-weight-800 text-white">Mengajar bahasa Arab itu mudah</h3>
                </div>
            </div>
        </div>

        <div class="col-md-9 mb-3">
            <div class="card bg-primary mb-2">
                <div class="card-body">
                    <p class="card-title h3 font-weight-400 text-white pb-0 mb-1">Jadwal</p>
                    <p class="h5 text-gray pt-0 mt-0">Jadwal Mengajar :</p>
                </div>
            </div>
            
            @if ($jadwals->count() > 0)
                @foreach ($jadwals as $jadwal)
                    <div class="">
                        <a href="/pengajar/jadwal/{{ $jadwal->kode_jadwal }}" class="btn  btn-fw bg-white shadow-md w-full mb-1 pl-4 pr-4 pt-0 pb-0 justify-content-center align-items-between mt-2 mb-2">
                            <div class="card-body row justify-content-between ">
                                <div class="row align-items-center">
                                    <div class="col mb-2">
                                        <p class="h4 row font-weight-bold mb-3">{{ $jadwal->kelompok->nama_kelas }}</p>
                                        <p class="h5 row font-weight-normal mb2">{{ $jadwal->pengajaran->hari }} {{ $jadwal->pengajaran->waktu->waktu_mulai }} - {{ $jadwal->pengajaran->waktu->waktu_berakhir }}</p>
                                        <p class="h5 row font-weight-normal">Ruangan : {{ $jadwal->ruangan }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <p class="h5 font-weight-bold">Lihat Detail </p>
                                    <i class="icon-arrow-right h5 font-weight-300 mr-2"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-3 ">
            <div class="card bg-primary">
                <div class="card-body">
                    <h5 class="card-title text-white">Modul :</h5>
                    @if ($jadwals->count() > 0)
                    @foreach ($jadwals as $jadwal)
                    <a href="{{ "/pengajar/materi/" . $jadwal->pengajaran->materi->kode_materi }}" class="btn bg-white btn-fw w-full  mr-2 mb-2" style="margin-right: 8px; scroll-snap-align: center;">
                        <p class="h5 text-primary text-center align-center font-weight-bold">{{ $jadwal->pengajaran->materi->nama_materi }}
                        </p>
                    </a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
