@extends('user.dashboard.layouts.main')

@section('container')
 <!-- Page Heading -->
 <div class="pagetitle">
    <p class="h3 card-title mb-2">Informasi Jadwal</p>
    <nav>
        <ol class="breadcrumb border border-gray bg-dark">
            <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="/user/kelas" class="text-white">Kelas</a></li>
            <li class="breadcrumb-item active text-white">Jadwal</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="mb-4">
    <div class="d-sm-flex align-items-center justify-content-between">
        <a href="/user/kelas/" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
    </div>
</div>
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Jadwal</h6>
            </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pengajar</th>
                        <th>Materi</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Sesi</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>Ustadz {{ $jadwal->pengajaran->pengajar->nama_lengkap }}</td>
                            <td>{{ $jadwal->pengajaran->materi->nama_materi }}</td>
                            <td>{{ $jadwal->kelompok->nama_kelas }}</td>
                            <td>{{ $jadwal->pengajaran->hari }}</td>
                            <td>{{ $jadwal->pengajaran->waktu->nama_waktu }}</td>
                            <td>{{ $jadwal->pengajaran->waktu->waktu_mulai }} - {{ $jadwal->pengajaran->waktu->waktu_berakhir }}</td>
                            <td>{{ $jadwal->ruangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection()
