@php
    $programs = \App\Models\Program::leftJoin('tingkats', 'tingkats.kode_tingkat', '=', 'programs.kode_tingkat')
        ->select('programs.*', 'tingkats.nama_tingkat')
        ->get();
@endphp
<!-- ======= Popular Courses Section ======= -->
<section id="all-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2 class="mb-4">Program</h2>
            <p>Program</p>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($programs as $program)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4 ">
                    <div class="course-item shadow bg-white">
                        <img src="{{ asset('/home/img/course-1.jpg') }}" class="img-fluid"
                            style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ $program->nama_tingkat ?: $program->kode_tingkat }}</h4>
                                <p class="price">Rp {{ $program->harga }}</p>
                            </div>
                            <h3 class="mb-1"><a
                                    href="{{ url('/user/program/' . $program->kode_program) }}">{{ $program->nama_program }}</a>
                            </h3>
                            <p>{{ $program->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
