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

    <link rel="stylesheet" href="/vendor/feather/feather.css">
    <link rel="stylesheet" href="/vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendor/css/vendor.bundle.base.css'">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/userdashboardjs/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/userdashboard/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/userdashboard/images/favicon.png}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        .kelas-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            margin-top: 2px;
        }

        .kelas-info p {
            margin-bottom: 10px;
        }
    </style>
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
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/logoe.svg') }}" alt="Kaba" width="24" height="24">
                </a>
            </div>
        </nav>
    </header>

    <main class="container mt-8">
        <form method="post" action="/user/pendaftaran">
            @csrf
            <div class="pagetitle">
                <h6 class="h4 font-weight-bold mb-4">Konfirmasi Pendaftaran Program</h6>
                <nav class="">
                    <ol class="breadcrumb border border-gray bg-dark">
                        <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                        <li class="breadcrumb-item"><a href="/user/program" class="text-white">Program</a></li>
                        <li class="breadcrumb-item"><a href="/user/program/{{ $program->kode_program }}"
                                class="text-white">Detail Program</a></li>
                        <li class="breadcrumb-item active text-white">Konfirmasi Pendaftaran</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="mb-4">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <a href="/user/program/{{ $program->kode_program }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold mb-3">Detail Program</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/img/course-1.jpg') }}" class="img-fluid rounded"
                                alt="Program Image">
                        </div>
                        <div class="col-md-8 mt-2">
                            <div class="row-md-8">
                                <h5 class="h4 font-weight-bold mb-2">{{ $program->nama_program }}</h5>
                                <p class="text-muted">{{ $program->deskripsi }}</p>
                            </div>
                            <div class="row">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Tingkat</td>
                                            <td>{{ $program->tingkat->nama_tingkat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Harga</td>
                                            <td>
                                                <div class="row">
                                                    <div>Rp </div>
                                                    <input type="hidden" id="jumlah_pembayaran" name="jumlah_pembayaran" value="{{ $program->harga }}">
                                                    <div>{{ $program->harga }}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Kouta Siswa</td>
                                            <td>{{ $program->kuota_siswa }} Orang</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-4 mb-4">
                        <p class="h5 font-weight-bold mb-3">Materi yang akan dipelajari:</p>
                        <ul class="list-group">
                            @php
                                $kodeMateris = explode(',', $program->kode_materi);
                            @endphp
                            @foreach ($kodeMateris as $kodeMateri)
                                @php
                                    $materi = \App\Models\Materi::where('kode_materi', $kodeMateri)->first();
                                @endphp
                                @if ($materi)
                                    <li class="list-group-item">
                                        <i class="icon-book h5 font-weight-300 mr-2"></i>
                                        <span>{{ $materi->nama_materi }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-5 ml-4 mb-4">
                        <p class="h5 font-weight-bold mb-3">Pilih Kelas:</p>
                        <div class="row-lg-6">
                            <div class="form-group">
                                <select id="kode_kelas" name="kode_kelas"
                                    class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kode_kelas') is-invalid @enderror">
                                    <option value="">Pilih kelas</option>
                                    @foreach ($kelompokAktif as $kelompok)
                                        @php
                                            $jumlahSiswa = $kelompok->jumlah_siswa ? $kelompok->jumlah_siswa : 0;
                                            $kuotaSiswa = $program->kuota_siswa;
                                            $disabled = $jumlahSiswa >= $kuotaSiswa ? 'disabled' : '';
                                            $kuotaTerpenuhi = $jumlahSiswa >= $kuotaSiswa ? ' (Kuota Terpenuhi)' : '';
                                        @endphp
                                        <option value="{{ $kelompok->kode_kelas }}" {{ $disabled }}>
                                            {{ $kelompok->nama_kelas }}
                                            ({{ $jumlahSiswa }}/{{ $kuotaSiswa }}{{ $kuotaTerpenuhi }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('kode_kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row-lg-6">
                            <div class="form-group">
                                <p class="h5 font-weight-bold mb-3">Detail Kelas</p>
                                <div id="data_kelas">
                                    <!-- Informasi detail kelas akan ditampilkan di sini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-4 mb-4 align-items-center justify-content-between">
                        <button type="submit" class="btn btn-dark btn-block bg-dark">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <a href="https://api.whatsapp.com/send/?phone=6285947366464&text=Assalamualaikum+admin+Kaba%2C+saya+ingin+bertanya..&type=phone_number&app_absent=0"
            class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        @include('user.dashboard.layouts.footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memperbarui tampilan data kelas
            function updateDataKelas(kodeKelas) {
                $.ajax({
                    url: '/user/program/konfirmasi-pendaftaran/' + kodeKelas,
                    method: 'GET',
                    success: function(response) {
                        var dataKelas =
                            '<div class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
                            '<p><span class="h6 font-weight-bold mb-3">Nama Kelas:</span></p>' +
                            '<p class="h6 text-muted">' + response.nama_kelas + '</p>' +
                            '<p><span class="h6 font-weight-bold mb-3">Deskripsi:</span></p>' +
                            '<p class="h6 text-muted">' + response.deskripsi + '</p>' +
                            '</div>';
                        $('#data_kelas').html(dataKelas);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Mengambil data kelas berdasarkan pilihan pertama
            var defaultKodeKelas = $('#kode_kelas').val();
            if (defaultKodeKelas) {
                updateDataKelas(defaultKodeKelas);
            }

            // Mengubah data kelas saat memilih dropdown
            $('#kode_kelas').on('change', function() {
                var kodeKelas = $(this).val();
                updateDataKelas(kodeKelas);
            });
        });
    </script>



    <!-- plugins:js -->
    <script src="/vendor/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/datatables.net/jquery.dataTables.js"></script>
    <script src="/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
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
