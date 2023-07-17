<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kaba') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logoe.svg') }}" alt="Kaba" width="24" height="24">
                </a>
            </div>
        </nav>
    </header>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper ">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-5 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="/logo/logo.svg" alt="logo">
                            </div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/userdashboard/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/userdashboard/js/hoverable-collapse.js"></script>
    <script src="/userdashboard/js/template.js"></script>
    <script src="/userdashboard/js/settings.js"></script>
    <!-- endinject -->
</body>

</html>
