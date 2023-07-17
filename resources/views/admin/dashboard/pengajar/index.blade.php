@extends('admin.dashboard.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="pagetitle">
        <h1 class="mb-2">Data Pengajar</h1>
        <nav>
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white">Pengajar</li>
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
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Data Pengajar</h6>
                    <a href="/admin/dashboard/pengajar/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-100"></i> Tambah Pengajar</a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pengajar</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Status Kerja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajars as $pengajar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengajar->kode_pengajar }}</td>
                                <td>{{ $pengajar->nama_lengkap }}</td>
                                <td>{{ $pengajar->email }}</td>
                                <td>{{ $pengajar->nomer_telepon }}</td>
                                <td>{{ $pengajar->status_kerja }}</td>
                                <td class="text-center">
                                    <a href="/admin/dashboard/pengajar/{{ $pengajar->kode_pengajar }}" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="/admin/dashboard/pengajar/{{ $pengajar->kode_pengajar }}/edit" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/dashboard/pengajar/{{ $pengajar->kode_pengajar }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal{{ $pengajar->kode_pengajar }}"><i class="fas fa-trash"></i></button>
                                        <div class="modal fade" id="basicModal{{ $pengajar->kode_pengajar }}" tabindex="-1">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title">Peringatan</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Kamu yakin menghapus akun pengajar tersebut?
                                                </div>
                                                <div class="modal-footer align-items-center justify-content-center">
                                                  <button type="button" class="btn btn-dark border-1" data-bs-dismiss="modal">Kembali</button>
                                                  <button type="submit" class="btn btn-danger">Hapus</button>
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
