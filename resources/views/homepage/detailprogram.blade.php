@extends('homepage.layouts.main')

@section('container')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Informasi Program</h2>
      <p>Detail Informasi programnya: </p>
    </div>
  </div><!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-8">
          <img src="{{ asset('/home/img/course-1.jpg')}}" class="img-fluid" alt="">
          <h3>{{ $program->nama_program }}</h3>
          <p>
            {{ $program->deskripsi }}
          </p>
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Tingkat</h5>
            <p><a href="#">{{ $program->tingkat->nama_tingkat }}</a></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Harga</h5>
            <p>Rp {{ $program->harga }}</p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Kouta Siswa</h5>
            <p>{{ $program->kuota_siswa }} Orang</p>
          </div>

          <a href="{{ "/user/program/" . $program->kode_program }}" class=" course-info d-flex btn btn-dark btn-rounded btn-fw bg-dark w-full text-align-center">Belajar Sekarang</a>
        </div>
      </div>
    </div>
  </section><!-- End Cource Details Section -->

<!-- ======= Cource Details Tabs Section ======= -->
<section id="cource-details-tabs" class="cource-details-tabs">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            @php
            $kodeMateris = explode(',', $program->kode_materi);
            $activeTab = true;
            @endphp
            @foreach ($kodeMateris as $kodeMateri)
            @php
            $materi = \App\Models\Materi::where('kode_materi', $kodeMateri)->first();
            @endphp
            @if ($materi)
            <li class="nav-item">
              <a class="nav-link {{ $activeTab ? 'active show' : '' }}" data-bs-toggle="tab" href="#tab-{{ $materi->kode_materi }}">{{ $materi->nama_materi }}</a>
            </li>
            @php
            $activeTab = false;
            @endphp
            @endif
            @endforeach
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            @php
            $activeTab = true;
            @endphp
            @foreach ($kodeMateris as $kodeMateri)
            @php
            $materi = \App\Models\Materi::where('kode_materi', $kodeMateri)->first();
            @endphp
            @if ($materi)
            <div class="tab-pane {{ $activeTab ? 'active show' : '' }}" id="tab-{{ $materi->kode_materi }}">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>{{ $materi->nama_materi }}</h3>
                  <p class="fst-italic">{{ $materi->deskripsi_singkat }}</p>
                  <p>{{ $materi->deskripsi }}</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="{{ $materi->gambar }}" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            @php
            $activeTab = false;
            @endphp
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Cource Details Tabs Section -->

@endsection
