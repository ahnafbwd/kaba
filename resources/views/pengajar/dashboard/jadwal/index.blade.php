@extends('pengajar.dashboard.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="pagetitle">
    <h1 class="mb-2">Jadwal</h1>
    <nav>
        <ol class="breadcrumb border border-gray shadow-md bg-dark">
            <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Jadwal</li>
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
                <h6 class="m-0 font-weight-bold text-dark">Tabel Jadwal</h6>
            </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Materi</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $jadwal->kelompok->nama_kelas }}</td>
                            <td>{{ $jadwal->pengajaran->materi->nama_materi }}</td>
                            <td>{{ $jadwal->pengajaran->hari }}</td>
                            <td>{{ $jadwal->pengajaran->waktu->waktu_mulai }} - {{ $jadwal->pengajaran->waktu->waktu_berakhir }} ({{ $jadwal->pengajaran->waktu->durasi }}  menit)</td>
                            <td>{{ $jadwal->ruangan }}</td>
                            <td><a href="{{ "/pengajar/jadwal/" . $jadwal->kode_jadwal }}" class="btn-sm btn-info text white">Lihat Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
