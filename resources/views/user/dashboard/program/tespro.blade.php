<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('/home/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @php
        $programs = \App\Models\Program::leftJoin('tingkats', 'tingkats.kode_tingkat', '=', 'programs.kode_tingkat')
            ->select('programs.*', 'tingkats.nama_tingkat')
            ->get();

        $tingkats = \App\Models\Tingkat::all();
    @endphp
    <section id="popular-courses" class="courses row d-flex justify-content-between align-items-center">
    @foreach ($programs as $program)
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="course-item">
            <img src="{{ asset('/img/course-1.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{ $program->nama_tingkat ?: $program->kode_tingkat }}</h4>
                    <p class="price">Rp {{ $program->harga }}</p>
                </div>
                <h3><a href="{{ url('/user/program/' . $program->kode_program) }}">{{ $program->nama_program }}</a>
                </h3>
                <p>{{ $program->deskripsi }}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                        <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid"
                            alt="">
                        <span>{{ $program->kelompoks->count() }} kelas</span>
                    </div>
                    <div class="trainer-rank d-flex align-items-center">
                        <i class="bx bx-user"></i>&nbsp;{{ $program->kelompoks->sum('jumlah_siswa') }} siswa &nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Course Item-->
    @endforeach
</section>


    <!-- Vendor JS Files -->
    <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/home/js/main.js') }}"></script>

</body>

</html>
