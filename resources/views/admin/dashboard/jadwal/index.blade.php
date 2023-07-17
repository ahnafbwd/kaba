@extends('admin.dashboard.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="pagetitle">
        <h1 class="mb-2">Data Jadwal</h1>
        <nav>
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Data Jadwal</h6>
                    <a href="/admin/dashboard/jadwal/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-100"></i> Tambah Jadwal</a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jadwal</th>
                            <th>Pengajar</th>
                            <th>Materi</th>
                            <th>Kelas</th>
                            <th>Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->kode_jadwal }}</td>
                                <td>Ustadz {{ $jadwal->pengajaran->pengajar->nama_lengkap }}</td>
                                <td>{{ $jadwal->pengajaran->materi->nama_materi }}</td>
                                <td>{{ $jadwal->kelompok->nama_kelas }}</td>
                                <td>{{ $jadwal->ruangan }}</td>
                                <td class="text-center">
                                    <a href="/admin/dashboard/jadwal/{{ $jadwal->kode_jadwal }}" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="/admin/dashboard/jadwal/{{ $jadwal->kode_jadwal }}/edit" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/dashboard/jadwal/{{ $jadwal->kode_jadwal }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal{{ $jadwal->kode_jadwal }}"><i class="fas fa-trash"></i></button>
                                        <div class="modal fade" id="basicModal{{ $jadwal->kode_jadwal }}" tabindex="-1">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title">Peringatan</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Kamu yakin menghapus jadwal tersebut?
                                                </div>
                                                <div class="modal-footer align-items-center justify-content-center">
                                                  <button type="button" class="btn btn-dark border-1" data-bs-dismiss="modal">Kembali</button>
                                                  <button type="button-submit" class="btn btn-danger">Hapus</button>
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
@endsection
