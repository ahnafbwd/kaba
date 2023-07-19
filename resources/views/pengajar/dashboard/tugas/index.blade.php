@extends('pengajar.dashboard.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="pagetitle">
    <h1 class="mb-2">Data Tugas</h1>
    <nav>
        <ol class="breadcrumb border border-gray bg-dark">
            <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Tugas</li>
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Tabel Data Tugas</h6>
                <a href="/pengajar/tugas/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-100"></i> Tambah Tugas</a>
            </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Materi</th>
                        <th>Nama Tugas</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugases as $tugas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tugas->kelompok->nama_kelas }}</td>
                            <td>{{ $tugas->materi->nama_materi }}</td>
                            <td>{{ $tugas->nama_tugas }}</td>
                            <td>{{  Str::limit($tugas->deskripsi,30,'...') }}</td>
                            <td>{{ $tugas->status_tugas }}</td>
                            <td class="text-center">
                                <a href="/pengajar/tugas/{{ $tugas->kode_tugas }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="/pengajar/tugas/{{ $tugas->kode_tugas }}/edit" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/pengajar/tugas/{{ $tugas->kode_tugas }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="btn btn-danger bg-danger btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal{{ $tugas->kode_tugas }}"><i class="fas fa-trash"></i></button>
                                    <div class="modal fade" id="basicModal{{ $tugas->kode_tugas }}" tabindex="-1">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Peringatan</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Kamu yakin menghapus tugas ini?
                                            </div>
                                            <div class="modal-footer align-items-center justify-content-center">
                                              <button type="button" class="btn btn-dark bg-dark border-1" data-bs-dismiss="modal">Kembali</button>
                                              <button type="submit" class="btn btn-danger bg-danger">Hapus</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div><!-- End Basic Modal-->
                                </form>
                            </td>
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
