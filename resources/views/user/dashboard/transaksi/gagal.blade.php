@extends('user.dashboard.layouts.main')

@section('container')
     <!-- Page Heading -->
     <div class="pagetitle">
        <h6 class="h4 font-weight-bold mb-2">Daftar Pendaftaran dan Transaksi</h6>
        <nav>
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white">Transaksi</li>
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
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Data Pendaftaran dan Transaksi</h6>
                    <a href="/user/dashboard/pendaftaran/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-100"></i> Tambah Pendaftaran</a>
                </div>
        </div>
        <div class="card-body">
            <h6 class="font-weight-800 h3 mb-3 mt-3">
                <span><strong>Tidak Ada transaksi</strong></span>
            </h6>
        </div>
    </div>
@endsection
