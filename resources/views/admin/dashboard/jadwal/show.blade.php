@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Jadwal</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/jadwal" class="text-white">Jadwal</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/jadwal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/jadwal/{{ $jadwal->kode_jadwal }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Jadwal</a>
            <form action="/admin/jadwal/{{ $jadwal->kode_jadwal }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $jadwal->kode_jadwal }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Jadwal</button>
                <div class="modal fade" id="basicModal{{ $jadwal->kode_jadwal }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus jadwal tersebut?
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
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h2 class="font-semibold text-xl text-white leading-tight text-center">
                    {{ __('Data Jadwal') }}
                </h2>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                <div class="col-lg-6 mt-2 mb-2">
                                    <!-- Kode Jadwal -->
                                    <div class="row-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_jadwal" :value="__('Kode Jadwal')" />
                                        <x-text-input id="kode_jadwal" class="block mt-1 w-full" type="text"
                                            name="kode_jadwal" :value="old('kode_jadwal', $jadwal->kode_jadwal)" readonly />
                                        <x-input-error :messages="$errors->get('kode_jadwal')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Kode Pengajaran -->
                                    <div class="row-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_pengajaran" :value="__('Kode Pengajaran')" />
                                        <x-text-input id="kode_pengajaran" class="block mt-1 w-full" type="text"
                                            name="kode_pengajaran" :value="old('kode_pengajaran', $jadwal->kode_pengajaran)" readonly />
                                        <x-input-error :messages="$errors->get('kode_pengajaran')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Kelas -->
                                    <div class="row-lg-6 mt-2 mb-2">
                                        <x-input-label for="kelas" :value="__('Kelas')" />
                                        <x-text-input id="kelas" class="block mt-1 w-full" type="text"
                                            name="kelas" :value="old('kelas', $jadwal->kelompok->nama_kelas)" readonly />
                                        <x-input-error :messages="$errors->get('kelas')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Ruangan -->
                                    <div class="row-lg-6 mt-2 mb-2">
                                        <x-input-label for="ruangan" :value="__('Ruangan')" />
                                        <x-text-input id="ruangan" class="block mt-1 w-full" type="text"
                                            name="ruangan" :value="old('ruangan', $jadwal->ruangan)" readonly />
                                        <x-input-error :messages="$errors->get('ruangan')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <table class="table table-bordered" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <!-- Page Heading -->
                                                    <div class="items-center justify-center">
                                                        <h2
                                                            class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                                            {{ __('Informasi Pengajaran') }}
                                                        </h2>
                                                        <p class="font-semibold text-gray-800 text-center">Berikut
                                                            informasi pengajaran</p>
                                                        <h6 class="font-semibold text-dark-800 leading-tight text-center">*pilih kode pengajaran terlebih dahulu</h6>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="row-lg-8">
                                                        <div class="col d-sm-flex align-items-center justify-content-between">
                                                            <h8>Materi : </h8>
                                                            <h8>{{ $jadwal->pengajaran->materi->nama_materi }}</h8>
                                                        </div>
                                                        <div class="col d-sm-flex align-items-center justify-content-between">
                                                            <h8>Nama Pengajar : </h8>
                                                            <h8>Ustadz {{ $jadwal->pengajaran->pengajar->nama_lengkap }}</h8>
                                                        </div>
                                                        <div class="col d-sm-flex align-items-center justify-content-between">
                                                            <h8>Hari : </h8>
                                                            <h8>{{ $jadwal->pengajaran->hari }}</h8>
                                                        </div>
                                                        <div class="col d-sm-flex align-items-center justify-content-between">
                                                            <h8>Waktu : </h8>
                                                            <h8>{{ $jadwal->pengajaran->waktu->waktu_mulai }} - {{ $jadwal->pengajaran->waktu->waktu_berakhir }} WIB</h8>
                                                        </div>
                                                        <div class="col d-sm-flex align-items-center justify-content-between">
                                                            <h8>Status Pengajaran : </h8>
                                                            <h8>{{ $jadwal->pengajaran->status_pengajaran }}</h8>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
