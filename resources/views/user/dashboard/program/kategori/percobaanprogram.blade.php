@php
    // $programs = \App\Models\Program::with('tingkat')->get();
    // $tingkats = \App\Models\Tingkat::all();
    // $programs = \App\Models\Program::with('tingkat')->whereHas('tingkat',function ($query) {
    //     $query->whereColumn('kode_tingkat','programs.kode_tingkat');
    // })
    $programs = \App\Models\Program::leftJoin('tingkats', 'tingkats.kode_tingkat', '=', 'programs.kode_tingkat')
        ->select('programs.*', 'tingkats.nama_tingkat')
        ->get();
        $userCount = \App\Models\User::count();
    $pengajarCount = \App\Models\Pengajar::count();
    $programCount = \App\Models\Program::count();
@endphp
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs mt-0 mb-4" data-aos="fade-in">
    <div class="container">
        <div class="col">
            <div class="card-body col justify-content-center align-items-center g-2">
                <h2 class="text-left mb-2">Selamat Datang {{ Auth::guard('web')->user()->nama_lengkap }}</h2>
                <p class="text-left mb-2">Belajar bahasa Arab dengan profesional.</p>
            </div>
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }} User</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Pengajar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengajarCount }} Pengajar</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-person-workspace text-gray-300" style="font-size: 2rem"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Program</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $programCount }} Program</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-book text-gray-300" style="font-size: 2rem"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Siswa</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">20 Siswa</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- ======= Popular Courses Section ======= -->
<section id="all-courses" class="courses pt-1">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2 class="mb-4">Program</h2>
            <p>Program</p>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($programs as $program)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4 ">
                    <div class="course-item shadow bg-white">
                        <img src="{{ asset('/img/course-1.jpg') }}" class="img-fluid"
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
    </div>
</section>
