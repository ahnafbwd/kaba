@extends('pengajar.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Detail Absensi</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pengajar/absensi" class="text-white">Absensi</a></li>
                    <li class="breadcrumb-item active text-white">Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <!-- Page Heading -->
                                <div class="items-center justify-center">
                                    <h2 class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                        {{ __('Data Absensi') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Berikut data
                                        absensi</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <!-- Jadwal -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="jadwal" :value="__('Jadwal')" />
                                        <p class="h4 text-semibold">{{ $absensi->jadwal->kelompok->nama_kelas }} -
                                            {{ $absensi->jadwal->pengajaran->materi->nama_materi }}</p>
                                        <x-input-error :messages="$errors->get('jadwal')" class="mt-2" />
                                    </div>
                                    <!-- Tanggal Absensi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="tanggal_absensi" :value="__('Tanggal Absensi')" />
                                        <p class="h4 text-semibold">{{ $absensi->tanggal_absensi }}</p>
                                        <x-input-error :messages="$errors->get('tanggal_absensi')" class="mt-2" />
                                    </div>
                                    <!-- Status Kehadiran Pengajar -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="status_kehadiran_pengajar" :value="__('Status Kehadiran Pengajar')" />
                                        <p class="h4 text-semibold">{{ $absensi->status_kehadiran_pengajar }}</p>
                                        <x-input-error :messages="$errors->get('status_kehadiran_pengajar')" class="mt-2" />
                                    </div>
                                    <!-- Waktu Mulai -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="waktu_mulai" :value="__('Waktu Mulai')" />
                                        <p class="h4 text-semibold">{{ $absensi->waktu_mulai }}</p>
                                        <x-input-error :messages="$errors->get('waktu_mulai')" class="mt-2" />
                                    </div>
                                    <!-- Keterangan -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                                        <p class="h4 text-semibold">{{ $absensi->keterangan }}</p>
                                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                    </div>
                                    <!-- Waktu Berakhir -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="waktu_berakhir" :value="__('Waktu Berakhir')" />
                                        <p class="h4 text-semibold">{{ $absensi->waktu_berakhir }}</p>
                                        <x-input-error :messages="$errors->get('waktu_berakhir')" class="mt-2" />
                                    </div>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Daftar Siswa yang Sudah Absen</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Status Kehadiran</th>
                            <th>Waktu Kehadiran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensis as $presensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $presensi->siswa->user->nama_lengkap }}</td>
                                <td>{{ $presensi->status_kehadiran }}</td>
                                <td>{{ $presensi->waktu_presensi }}</td>
                                <td>{{ $presensi->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Daftar Siswa yang Belum Absen</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Siswa</th>
                            <th>Nama Siswa</th>
                            <th>Status Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswaBelumAbsen as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->kode_siswa }}</td>
                                <td>{{ $siswa->user->nama_lengkap }}</td>
                                <td>Alpa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add these scripts at the end of your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
