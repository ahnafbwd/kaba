@extends('admin.dashboard.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="pagetitle">
        <h1 class="mb-2">Data User</h1>
        <nav>
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white">User</li>
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
                <h6 class="m-0 font-weight-bold text-dark">Tabel Data User</h6>
                <a href="/admin/dashboard/user/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-100"></i> Tambah User</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode User</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->kode_user }}</td>
                                <td>{{ $user->nama_lengkap }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nomer_telepon }}</td>
                                <td class="text-center">
                                    <a href="/admin/dashboard/user/{{ $user->kode_user }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="/admin/dashboard/user/{{ $user->kode_user }}/edit"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/dashboard/user/{{ $user->kode_user }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-circle btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->kode_user }}"><i
                                                class="fas fa-trash"></i></button>
                                        <div class="modal fade" id="basicModal{{ $user->kode_user }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Kamu yakin menghapus akun user tersebut?
                                                    </div>
                                                    <div class="modal-footer align-items-center justify-content-center">
                                                        <button type="button" class="btn btn-dark border-1"
                                                            data-bs-dismiss="modal">Kembali</button>
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
