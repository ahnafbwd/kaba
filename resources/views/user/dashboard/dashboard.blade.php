@php
    $programs = \App\Models\Program::leftJoin('tingkats', 'tingkats.kode_tingkat', '=', 'programs.kode_tingkat')
        ->select('programs.*', 'tingkats.nama_tingkat')
        ->get();

    $tingkats = \App\Models\Tingkat::all();

@endphp

@extends('user.dashboard.layouts.main')

@section('container')
    <div>
        <div class="row mb-4 ml-0 mr-1">
            <div class="col card bg-primary">
                <div class="card-body">
                    <p class="card-title text-white">Selamat Datang, {{ Auth::guard('web')->user()->nama_lengkap }}</p>
                    <h3 class="h5 font-weight-800 text-white">Belajar bahasa Arab itu mudah, Yuk daftar sekarang</h3>
                </div>
            </div>
        </div>
        {{-- <div class="gallery" style="display: flex; align-items: center; column-gap: 20px; overflow-x: scroll; scroll-snap-type: x mandatory;">
            <div class="gallery__item" style="scroll-snap-align: center; min-width: 75%;">
                <img src="{{ asset('/img/course-1.jpg') }}" class="gallery__image" alt="program" style="width: 100%; height:100%; object-fit:cover;">
            </div>
            <div class="gallery__item" style="scroll-snap-align: center; min-width: 75%;">
                <img src="{{ asset('/img/course-1.jpg') }}" class="gallery__image" alt="program" style="width: 100%; height:100%; object-fit:cover;">
            </div>
            <div class="gallery__item" style="scroll-snap-align: center; min-width: 75%;">
                <img src="{{ asset('/img/course-1.jpg') }}" class="gallery__image" alt="program" style="width: 100%; height:100%; object-fit:cover;">
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-9 grid-margin transparent">
                <div class="card shadow-sm mb-0">
                    <div class="card-body">
                        <p class="card-title">Program Pilihan</p>
                        <h3 class="font-weight-500">Rekomendasi program untuk kamu ikuti</h3>
                    </div>
                </div>
                <section id="popular-courses" class="courses row d-flex justify-content-between align-items-center">
                    @foreach ($programs as $program)
                        <div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-4 " data-aos="zoom-out"
                            data-aos-delay="100">
                            <div class="course-item bg-white">
                                <img src="{{ asset('/img/course-1.jpg') }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $program->nama_tingkat ?: $program->kode_tingkat }}</h4>
                                        <p class="price">Rp {{ $program->harga }}</p>
                                    </div>
                                    <h3><a
                                            href="{{ url('/user/program/' . $program->kode_program) }}">{{ $program->nama_program }}</a>
                                    </h3>
                                    <p>{{ Str::limit($program->deskripsi, 50, '...') }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                            <span>{{ $program->kelompoks->count() }} kelas</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bx bx-user"></i>&nbsp;{{ $program->kelompoks->sum('jumlah_siswa') }}
                                            siswa &nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </section>
            </div>
            <div class="courses col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <p class="card-title mb-1">Program Terdaftar</p>
                            <p class="h6 font-weight-300">Program yang sudah ikuti :</p>
                        </div>
                        <div>
                            @php
                                $kodeUser = Auth::guard('web')->user()->kode_user;
                                $statusdaftar = \App\Models\Siswa::where('kode_user', $kodeUser)
                                    ->with('pendaftaran', 'kelompok')
                                    ->first();
                                if (!$statusdaftar) {
                                    $programnya = null;
                                } else {
                                    $programnya = $statusdaftar->kelompok->program;
                                }
                                // $programs = \App\Models\Program::leftJoin('tingkats', 'tingkats.kode_tingkat', '=', 'programs.kode_tingkat')->select('programs.*', 'tingkats.nama_tingkat')->get();

                                // $tingkats = \App\Models\Tingkat::all();
                            @endphp

                            @if ($programnya)
                                <div class="mt-2 mb-2">
                                        <div class="course-item">
                                    <img src="{{ asset('/img/course-1.jpg') }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $program->nama_tingkat ?: $programnya->kode_tingkat }}</h4>
                                    </div> --}}
                                    <h3 class="mb-1"><a
                                            href="{{ url('/user/program/' . $programnya->kode_program) }}">{{ $programnya->nama_program }}</a>
                                    </h3>
                                    <p>{{ Str::limit($programnya->deskripsi, 50, '...') }}</p>
                                </div>
                            @else
                                <p class="h6">Tidak ada program yang telah diikuti.</p>
                            @endif
                        </div>
                        @if ($programnya)
                        <a href="{{ url('/user/program/' . $programnya->kode_program) }}"><button type="button"
                            class="btn btn-dark btn-rounded btn-fw bg-dark w-full mt-4">Selengkapnya</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
