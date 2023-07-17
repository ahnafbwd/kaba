@extends('pengajar.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Informasi Jadwal</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pengajar/jadwal" class="text-white">Jadwal</a></li>
                    <li class="breadcrumb-item active text-white">Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/pengajar/jadwal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h2 class="font-semibold text-xl text-white leading-tight text-center">
                        {{ __('Detail Jadwal') }}
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
                                            <!-- Kelas -->
                                            <div class="col-lg-6 mt-2 mb-2">
                                                <x-input-label for="kelas" :value="__('Kelas')" />
                                                <x-text-input id="kelas" class="block mt-1 w-full" type="text"
                                                    name="kelas" :value="old('kelas', $jadwal->kelompok->nama_kelas)" readonly />
                                                <x-input-error :messages="$errors->get('kelas')" class="mt-2 mb-2" />
                                            </div>
                                            <!-- Materi -->
                                            <div class="col-lg-6 mt-2 mb-2">
                                                <x-input-label for="nama_materi" :value="__('Materi')" />
                                                <x-text-input id="nama_materi" class="block mt-1 w-full" type="text"
                                                    name="nama_materi" :value="old('nama_materi', $jadwal->pengajaran->materi->nama_materi)" readonly />
                                                <x-input-error :messages="$errors->get('nama_materi')" class="mt-2 mb-2" />
                                                </div>
                                            </div>
                                                <div class="row">
                                            <!-- Waktu -->
                                            <div class="col-lg-6 mt-2 mb-2">
                                                <x-input-label for="waktu" :value="__('Waktu Mulai')" />
                                                <x-text-input id="waktu" class="block mt-1 w-full" type="text"
                                                    name="waktu" :value="old('waktu', $jadwal->pengajaran->waktu->waktu_mulai)" readonly />
                                                    <x-input-error :messages="$errors->get('waktu')" class="mt-2 mb-2" />
                                                    </div>
                                                <div class="col-lg-6 mt-2 mb-2">
                                                <x-input-label for="waktu" :value="__('Waktu Berakhir')" />
                                                <x-text-input id="waktuakhir" class="block mt-1 w-full" type="text"
                                                    name="waktuakhir" :value="old('waktuakhir', $jadwal->pengajaran->waktu->waktu_berakhir)" readonly />
                                                <x-input-error :messages="$errors->get('waktu')" class="mt-2 mb-2" />
                                            </div>
                                        </div>
                                            <div class="row">

                                            <!-- Ruangan -->
                                            <div class="col-lg-6 mt-2 mb-2">
                                                <x-input-label for="ruangan" :value="__('Ruangan')" />
                                                <x-text-input id="ruangan" class="block mt-1 w-full" type="text"
                                                    name="ruangan" :value="old('ruangan', $jadwal->ruangan)" readonly />
                                                <x-input-error :messages="$errors->get('ruangan')" class="mt-2 mb-2" />
                                            </div>
                                            <!-- Status Pengajaran -->
                                            <div class="col-lg-6 mt-2 mb-2">
                                                <x-input-label for="status_pengajaran" :value="__('Status Pengajaran')" />
                                                <x-text-input id="status_pengajaran" class="block mt-1 w-full" type="text"
                                                    name="status_pengajaran" :value="old('status_pengajaran', $jadwal->pengajaran->status_pengajaran)" readonly />
                                                <x-input-error :messages="$errors->get('status_pengajaran')" class="mt-2 mb-2" />
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
