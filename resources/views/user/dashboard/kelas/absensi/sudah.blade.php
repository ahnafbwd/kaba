@extends('user.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Presensi</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/user/absensi" class="text-white">Absensi</a></li>
                    <li class="breadcrumb-item active text-white">Presensi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="col-md-8">
            <div class="card bg-white shadow-sm mb-3">
                <div class="card-body">
                    <p class="card-title h3 font-weight-400 text-primary pb-0 mb-2 mt-1">Anda sudah melakukan absensi</p>
                    <p class="h5 text-gray pt-0 mt-0">Silahkan hubungi admin untuk informasi lebih lanjut jika terdapat
                        kesalahan</p>
                </div>
            </div>
        </div>
    </div>
@endsection
