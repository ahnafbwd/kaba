@extends('pengajar.dashboard.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="pagetitle">
        <h1 class="card-title font-weight-bold mb-2">Detail Kelas</h1>
        <nav>
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/pengajar/kelas" class="text-white">Kelas</a></li>
                <li class="breadcrumb-item active text-white">Detail Kelas</li>
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
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Nama Kelas: </h5>
                                <h5 class="font-weight-bold text-white">{{ $kelompok->nama_kelas }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Program : </h5>
                                <h5 class="font-weight-bold text-white">{{ $kelompok->program->nama_program }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Jumlah Siswa : </h5>
                                <h5 class="font-weight-bold text-white">{{ $kelompok->jumlah_siswa }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Angkatan : </h5>
                                <h5 class=" text-white">{{ $kelompok->angkatan->angkatan }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Status Kelas : </h5>
                                <h5 class="font-weight-bold text-white">{{ $kelompok->status_kelas }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Deskripsi : </h5>
                                <h5 class="font-weight-bold text-white">{{ $kelompok->deskripsi }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <h5 class="text-white">Tingkat : </h5>
                                <h5 class="font-weight-bold text-white">{{ $kelompok->program->tingkat->nama_tingkat }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="col d-sm-flex align-items-center justify-content-between">
                                <a href="{{ $kelompok->link_wa }}" class="btn btn-fw bg-green w-full btn-success mr-2" style=" margin-right: 8px; scroll-snap-align: center;"><p class="text-white font-weight-bold"><i class="fab fa-whatsapp mr-2"></i>Link Grup Whatsapp</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Data Siswa</h6>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nomer Whatsapp</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Status Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->user->nama_lengkap }}</td>
                                <td>{{ $siswa->user->nomer_telepon }}</td>
                                <td>{{ $siswa->user->jenis_kelamin }}</td>
                                <td>{{ $siswa->user->tanggal_lahir }}</td>
                                <td>{{ $siswa->status_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
