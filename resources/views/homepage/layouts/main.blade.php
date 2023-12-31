<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    <meta name="title" content="Kursus Bahasa Arab Kaba | Belajar Bahasa Arab dari Nol">
    <meta name="description" content="Selamat datang di Kursus Bahasa Arab Kaba! Kami menawarkan kursus bahasa Arab yang menyenangkan dan efektif untuk pemula hingga tingkat lanjutan. Bergabunglah sekarang dan tingkatkan kemampuan berbahasa Arab Anda!">
    <meta name="keywords" content="Kursus Bahasa Arab, Belajar Bahasa Arab, Kursus Bahasa Arab Kaba, Kursus Bahasa Arab pemula">


    <!-- Favicons -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link href="{{ asset('img/logo.png') }}" rel="apple-touch-icon">

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
    @include('homepage.layouts.header')

    <main>

        @yield('container')

    </main>
    <a href="https://api.whatsapp.com/send/?phone=6285947366464&text=Assalamualaikum+admin+Kaba%2C+saya+ingin+bertanya..&type=phone_number&app_absent=0" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    @include('homepage.layouts.footer')
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
