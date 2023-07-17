{{-- @extends('user.dashboard.layouts.main')

@section('container')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Menu</h5>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Materi 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Materi 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Materi 3</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Materi 4</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Materi 1</h5>
          <p class="card-text">Ini adalah isi dari materi 1.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection --}}
@extends('user.dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card bg-primary">
                    <div class="card-body">
                        <p class="card-title h3 font-weight-400 text-white">Program {{ $siswa->kelompok->program->nama_program }}</p>
                        <p class="h5 text-white">Kelas {{ $siswa->kelompok->nama_kelas }}</p>
                        <p class="h5 text-white"> $waktuAkses</p>
                    </div>
                    <hr class="bg-white ml-4 mr-4">
                    <div class="card-body d-flex justify-content-between align-items-center" style="overflow-x: auto; white-space: nowrap; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch;">
                        <a href="/user/jadwal" class="btn btn-light flex-fill mr-2" style=" margin-right: 8px; scroll-snap-align: center;"><p class="text-primary font-weight-bold">Jadwal</p></a>
                        <a href="#" class="btn btn-light flex-fill mr-2" style=" margin-right: 8px; scroll-snap-align: center;"><p class="text-primary font-weight-bold">Absensi</p></a>
                        <a href="/user/tugas" class="btn btn-light flex-fill mr-2" style=" margin-right: 8px; scroll-snap-align: center;"><p class="text-primary font-weight-bold">Tugas</p></a>
                        <a href="#" class="btn btn-light flex-fill" style=" scroll-snap-align: center;"><p class="text-primary font-weight-bold">Informasi</p></a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card bg-primary mb-3">
                    <div class="card-body">
                        <p class="card-title h3 font-weight-400 text-white pb-0 mb-1">Materi</p>
                        <p class="h5 text-gray pt-0 mt-0">Kumpulan materi : </p>
                    </div>
                </div>
                        @php
                            $kodeMateris = explode(',', $siswa->kelompok->program->kode_materi);
                        @endphp
                        @foreach ($kodeMateris as $kodeMateri)
                            @php
                                $materi = \App\Models\Materi::where('kode_materi', $kodeMateri)->first();
                            @endphp
                            @if ($materi)
                            <div class="">
                              <a href="/user/materi/{{ $materi->kode_materi }}" class="btn btn-info btn-fw bg-gray w-full mb-1 pl-4 pr-4 pt-0 pb-0 justify-content-center align-items-between mt-2 mb-2">
                                  <div class="card-body row justify-content-between align-items-between">
                                    <div class="row">
                                    <i class="icon-book h5 font-weight-300 mr-2"></i>
                                      <p class="h5 font-weight-300">{{ $materi->nama_materi }}</p>
                                  </div>
                                        <div class="row">
                                        <p class="h5 font-weight-300">Lihat Detail </p>
                                        <i class="icon-arrow-right h5 font-weight-300 mr-2"></i>
                                      </div>
                                  </div>
                              </a>
                            </div>
                            @endif
                        @endforeach
            </div>
            <div class="col-md-4">
                <div class="card bg-primary">
                    <div class="card-body ">
                        <h5 class="card-title text-white">Informasi Kelas</h5>
                        <a href="{{ $siswa->kelompok->link_wa }}" class="btn btn-fw bg-green w-full btn-success mr-2" style=" margin-right: 8px; scroll-snap-align: center;"><p class="text-white font-weight-bold"><i class="fab fa-whatsapp mr-2"></i>Link Grup Whatsapp</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
