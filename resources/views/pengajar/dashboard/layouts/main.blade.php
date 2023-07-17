<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link href="{{ asset('img/logo.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/home/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="/userdashboard/vendors/feather/feather.css">
    <link rel="stylesheet" href="/userdashboard/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/userdashboard/vendors/css/vendor.bundle.base.css'">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/userdashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/userdashboard/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/userdashboardjs/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/userdashboard/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/userdashboard/images/favicon.png}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- =======================================================
  * Template Name: Mentor
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('pengajar.dashboard.layouts.header')

    <main>
        <div class="container-fluid page-body-wrapper">
            @include('pengajar.dashboard.layouts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper" style="background-color: #f6f7f6">
                    @yield('container')
                </div>
            </div>
        </div>
    </main>
    <a href="https://api.whatsapp.com/send/?phone=6285947366464&text=Assalamualaikum+admin+Kaba%2C+saya+ingin+bertanya..&type=phone_number&app_absent=0"
        class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('pengajar.dashboard.layouts.footer')
    <!-- plugins:js -->
    <script src="/userdashboard/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/userdashboard/vendors/chart.js/Chart.min.js"></script>
    <script src="/userdashboard/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/userdashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/userdashboard/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/userdashboard/js/off-canvas.js"></script>
    <script src="/userdashboard/js/hoverable-collapse.js"></script>
    <script src="/userdashboard/js/template.js"></script>
    <script src="/userdashboard/js/settings.js"></script>
    <script src="/userdashboard/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/userdashboard/js/dashboard.js"></script>
    <script src="/userdashboard/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

</body>

</html>
