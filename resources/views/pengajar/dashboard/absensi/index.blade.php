@extends('pengajar.dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="col card bg-primary">
                <div class="card-body">
                    <p class="card-title text-white mb-0">Absensi</p>
                </div>
            </div>
        </div>
        <div class="col">
        <!-- Page Heading -->
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb border border-gray shadow-md bg-dark">
                    <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Absensi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (session()->has('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow-md mb-4">
            <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Tabel Absensi</h6>
                        <a href="/pengajar/absensi/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-100"></i> Tambah Absensi</a>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kelas - Materi</th>
                                <th>Hari - Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensis as $absensi)
                                    <tr>
                                        <td>{{ $absensi->jadwal->kelompok->nama_kelas }} - {{ $absensi->jadwal->pengajaran->materi->nama_materi }}</td>
                                        <td>{{ $absensi->jadwal->pengajaran->hari }}, {{ $absensi->tanggal_absensi }}</td>
                                        <td>{{ $absensi->waktu_mulai }} - {{ $absensi->waktu_berakhir }}</td>
                                        <td>{{ $absensi->status_kehadiran_pengajar }}</td>
                                        <td>{{ Str::limit($absensi->keterangan, 30, '...') }}</td>
                                        <td><a href="{{ "/pengajar/absensi/" . $absensi->kode_absensi }}" class="btn-sm btn-info text white">Lihat Detail</a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
