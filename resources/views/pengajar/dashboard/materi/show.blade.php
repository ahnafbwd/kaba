@extends('pengajar.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Materi</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/pengajar/materi" class="text-white">Materi</a></li>
                <li class="breadcrumb-item active text-white">Detail Materi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/pengajar/materi" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h2 class="font-semibold text-xl text-white leading-tight text-center">
                    {{ __('Data Materi') }}
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
                                    <!-- Kode Materi -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_materi" :value="__('Kode Materi')" />
                                        <x-text-input id="kode_materi" class="block mt-1 w-full" type="text"
                                            name="kode_materi" :value="old('kode_materi', $materi->kode_materi)" readonly />
                                        <x-input-error :messages="$errors->get('kode_materi')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama Materi -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_materi" :value="__('Nama Materi')" />
                                        <x-text-input id="nama_materi" class="block mt-1 w-full" type="text"
                                            name="nama_materi" :value="old('nama_materi', $materi->nama_materi)" readonly />
                                        <x-input-error :messages="$errors->get('nama_materi')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Deskripsi Singkat -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                        <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text"
                                            name="deskripsi_singkat" :value="old('deskripsi_singkat', $materi->deskripsi_singkat)" readonly />
                                        <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Modul -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="modul" :value="__('Modul')" />
                                        <div class="input-group">
                                            <input type="text" class="form-control" disabled value="{{ $materi->modul ?? 'Tidak ada modul yang diunggah' }}">
                                            @if ($materi->modul)
                                                <a href="{{ route('materi.download', $materi->kode_materi) }}" class="btn btn-dark mb-2" download>Download</a>
                                            @endif
                                        </div>
                                        <x-input-error :messages="$errors->get('modul')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Deskripsi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                        <textarea id="deskripsi" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" readonly>{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
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
