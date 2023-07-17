@php
    $tingkats = \App\Models\Tingkat::all();
    $programs = \App\Models\Program::all();
@endphp
@extends('homepage.layouts.main')
@section('container')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
      <h2>Program</h2>
      <p>Belajar bahasa Arab menjadi lebih mudah dengan Kaba. Kami menyediakan beragam kursus yang akan membantu Anda menguasai bahasa Arab secara efektif dan menyenangkan. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Courses Section ======= -->
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @foreach ($programs as $program)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-out" data-aos-delay="100">
          <div class="course-item">
            <img src="{{ asset('/home/img/course-1.jpg')}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{ $program->tingkat->nama_tingkat }}</h4>
                <p class="price">Rp {{ $program->harga }}</p>
              </div>

              <h3><a href="{{ url('/program/' . $program->kode_program) }}">{{ $program->nama_program }}</a></h3>
              <p>{{ $program->deskripsi }}</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                  <span>{{ $program->kelompoks->count() }} kelas</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;{{ $program->kelompoks->sum('jumlah_siswa') }} siswa
                  &nbsp;&nbsp;
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        @endforeach
      </div>
    </div>
  </section><!-- End Courses Section -->
@endsection
