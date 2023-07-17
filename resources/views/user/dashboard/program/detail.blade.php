@extends('user.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Detail Program</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <form method="post" action="/user/pendaftaran">
            @csrf
            <div class="row mb-4 ml-0 mr-1">
                <div class="col card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Informasi Detail Program</p>
                            <h4 class="font-weight-500">Berikut informasi detail dari program
                                <span><strong>{{ $program->nama_program }}</strong></span> :
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 grid-margin transparent">
                    <div class="row-md-7 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="{{ asset('/home/img/course-1.jpg') }}" class="img-fluid mb-2"
                                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                                <h6 class="font-weight-800 h3 mb-3 mt-3">
                                    <span><strong>{{ $program->nama_program }}</strong></span>
                                </h6>
                                <hr>
                                <p class="h5 mt-3">{{ $program->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row-md-7 grid-margin-1 stretch-card mt-1">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="card-title font-weight-500 mb-1 ml-1">Materi yang akan dipelajari : </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <ul id="kode_materi" name="kode_materi[]"
                                        class="list-group block appearance-none w-full py-2 px-3 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        readonly>
                                        @php
                                            $kodeMateris = explode(',', $program->kode_materi);
                                        @endphp
                                        @foreach ($kodeMateris as $kodeMateri)
                                            @php
                                                $materi = \App\Models\Materi::where('kode_materi', $kodeMateri)->first();
                                            @endphp
                                            @if ($materi)
                                                <li class="list-group-item border-0 mb-1">
                                                    <div class="row align-items-center mb-2">
                                                        <i class="icon-book h5 font-weight-300 mr-2"></i>
                                                        <p class="h5 font-weight-300">{{ $materi->nama_materi }}</p>
                                                    </div>
                                                    <hr>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin transparent mb-4 mt-0">
                    <div class="row-md-4 grid-margin-1 stretch-card mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="card-title mb-0 ml-1">Detail Program : </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <ul class="list-group block appearance-none w-full py-2 px-3">
                                        <li class="list-group-item border-0">
                                            <div class="row d-flex justify-content-between align-items-center mt-2">
                                                <p class="h5 font-weight-300">Tingkat</p>
                                                <p class="h5 font-weight-300"><a
                                                        href="#">{{ $program->tingkat->nama_tingkat }}</a></p>
                                            </div>
                                        </li>
                                        <hr>
                                        <li class="list-group-item border-0">
                                            <div class="row d-flex justify-content-between align-items-center mt-2">
                                                <p class="h5 font-weight-300">Harga</p>
                                                <p class="h5 font-weight-300" id="jumlah_pembayaran" name="jumlah_pembayaran" value="{{ $program->harga }}">Rp {{ $program->harga }}</p>
                                            </div>
                                        </li>
                                        <hr>
                                        <li class="list-group-item border-0">
                                            <div class="row d-flex justify-content-between align-items-center mt-2">
                                                <p class="h5 font-weight-300">Kouta Siswa</p>
                                                <p class="h5 font-weight-300">{{ $program->kuota_siswa }} Orang</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-md-4 grid-margin stretch-card mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="card-title mb-0 ml-1">Pilih Kelas : </p>
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="row-lg-6 ml-3 mr-3 mt-3">
                                        <div class="form-group">
                                            @php
                                                $program->load('tingkat', 'materi', 'jadwal', 'kelompoks');
                                                // Mendapatkan kelompok dengan status kelas aktif
                                                $kelompokAktif = $program
                                                    ->kelompoks()
                                                    ->where('status_kelas', 'Aktif')
                                                    ->get();
                                            @endphp
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
                                    <div class="row-lg-6 ml-3 mr-3 mt-1">
                                        <div class="form-group">
                                            <p class="h5 font-weight-bold mb-3">Detail Kelas</p>
                                            <div id="data_kelas">
                                                <!-- Informasi detail kelas akan ditampilkan di sini -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $kodeUser = Auth::guard('web')->user()->kode_user;
                        $statusdaftar = \App\Models\Siswa::where('kode_user', $kodeUser)->with('pendaftaran', 'kelompok')->first();
                        $programnya = $statusdaftar->kelompok->program->kode_program;
                        if ($programnya == $program->kode_program) {
                            $daftar = 'tidak';
                        } else {
                            $daftar = 'bisa';
                        }
                    @endphp

                    @if ($daftar == 'bisa')
                        <button type="submit" class="btn btn-primary mt-4 btn-block bg-dark">Daftar Sekarang</button>
                    @else
                        <button type="submit" class="btn btn-secondary mt-4 btn-block bg-secondary" disabled>Anda sudah terdaftar program ini </button>
                    @endif

                </div>
            </div>
        </form>
    </div>

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
@endsection
