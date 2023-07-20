@php
    $userCount = \App\Models\User::count();
    $pengajarCount = \App\Models\Pengajar::count();
    $adminCount = \App\Models\Admin::count();
    $siswaCount = \App\Models\Program::count();
    $tingkatCount = \App\Models\Tingkat::count();
    $angkatanCount = \App\Models\Angkatan::count();
    $programCount = \App\Models\Program::count();
    $kelasCount = \App\Models\Kelompok::count();
    $materiCount = \App\Models\Materi::count();
@endphp

@extends('admin.dashboard.layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="col card-body">
                        User
                        <div class="text-white-50 small">{{ $userCount }} User</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Pengajar
                        <div class="text-white-50 small">{{ $pengajarCount }} Pengajar</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Admin
                        <div class="text-white-50 small">{{ $adminCount }} Admin</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-warning text-primary shadow">
                    <div class="card-body">
                        Siswa
                        <div class="text-primary-50 small">{{ $siswaCount }} Siswa</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="col card-body">
                        Tingkat
                        <div class="text-white-50 small">{{ $tingkatCount }} Tingkat</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Angkatan
                        <div class="text-white-50 small">{{ $angkatanCount }} Angkatan</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-light text-primary shadow">
                    <div class="card-body">
                        Program
                        <div class="text-primary-50 small">{{ $programCount }} Program</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Kelas
                        <div class="text-white-50 small">{{ $kelasCount }} Kelas</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
