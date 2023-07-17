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
    <script type="text/javascript"
    src="{{ config('midtrans.snap_url') }}"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
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

    <main class="container mt-8 mb-8">
            <div class="pagetitle">
                <h6 class="h4 font-weight-bold mb-4">Konfirmasi Pendaftaran</h6>
                <nav class="">
                    <ol class="breadcrumb border border-gray bg-dark">
                        <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                        <li class="breadcrumb-item"><a href="/user/pendaftaran" class="text-white">Transaksi</a></li>
                        <li class="breadcrumb-item active text-white">Konfirmasi Pendaftaran</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="mb-4">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <a href="/user/pendaftaran" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold mb-3">Detail Program</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('/home/img/course-1.jpg') }}" class="img-fluid rounded"
                                        alt="Program Image">
                                </div>
                                <div class="col-md-8 mt-2">
                                    <div class="row-md-8">
                                        <h5 class="h4 font-weight-bold mb-2">
                                            {{ $pendaftaran->kelompok->program->nama_program }}</h5>
                                        <p class="text-muted">{{ $pendaftaran->kelompok->program->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-4 mb-4">
                                <p class="h5 font-weight-bold mb-3">Materi yang akan dipelajari:</p>
                                <ul class="list-group">
                                    @php
                                        $kodeMateris = explode(',', $pendaftaran->kelompok->program->kode_materi);
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
                                <p class="h5 font-weight-bold mb-3">Kelas yang dipilih:</p>
                                <div class="row-lg-6">
                                    <div class="form-group">
                                        <x-text-input id="kode_kelas" class="block mt-1 w-full" type="text"
                                            name="kode_kelas" :value="old('kode_kelas', $pendaftaran->kelompok->nama_kelas)" readonly />
                                        <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row-lg-6">
                                    <div class="form-group">
                                        <p class="h5 font-weight-bold mb-3">Detail Kelas</p>
                                        <div id="data_kelas">
                                            <!-- Informasi detail kelas akan ditampilkan di sini -->
                                            <div
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <p><span class="h6 font-weight-bold mb-3">Nama Kelas:</span></p>
                                                <p class="h6 text-muted">{{ $pendaftaran->kelompok->nama_kelas }} </p>
                                                <p><span class="h6 font-weight-bold mb-3">Deskripsi:</span></p>
                                                <p class="h6 text-muted">{{ $pendaftaran->kelompok->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Tingkat</td>
                                            <td>{{ $pendaftaran->kelompok->program->tingkat->nama_tingkat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Harga</td>
                                            <td class="font-weight-bold">Rp
                                                {{ $pendaftaran->kelompok->program->harga }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Kouta Siswa</td>
                                            <td>{{ $pendaftaran->kelompok->program->kuota_siswa }} Orang</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        <button type="submit" id="pay-button" class="btn btn-dark btn-rounded btn-fw bg-dark w-full mt-4">Bayar Sekarang</button>
                        <form action="/user/pendaftaran/{{ $pendaftaran->kode_pendaftaran }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger btn-rounded btn-fw bg-danger w-full mt-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $pendaftaran->kode_pendaftaran }}">Batalkan Pendaftaran</button>
                            <div class="modal fade" id="basicModal{{ $pendaftaran->kode_pendaftaran }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Peringatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Kamu yakin membatalkan pendaftaran program tersebut?
                                        </div>
                                        <div class="modal-footer align-items-center justify-content-center">
                                            <button type="button" class="btn btn-dark border-1 bg-dark"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger bg-danger">Batalkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Basic Modal-->
                        </form>
                </div>

            </div>
    </main>

    <footer class="mt-8">
        <a href="https://api.whatsapp.com/send/?phone=6285947366464&text=Assalamualaikum+admin+Kaba%2C+saya+ingin+bertanya..&type=phone_number&app_absent=0"
            class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        @include('user.dashboard.layouts.footer')
    </footer>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
              window.location.href = '/user/dashboard';
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

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
