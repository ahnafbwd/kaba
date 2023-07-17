@extends('user.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <p class="h3 card-title mb-2">Informasi Materi</p>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Kelas</a></li>
                <li class="breadcrumb-item"><a href="/user/dashboard/materi" class="text-white">Materi</a></li>
                <li class="breadcrumb-item active text-white">Detail Materi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/user/kelas/" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
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
                                    <!-- Nama Materi -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_materi" :value="__('Nama Materi')" />
                                        <x-text-input id="nama_materi" class="block mt-1 w-full" type="text"
                                            name="nama_materi" :value="old('nama_materi', $materi->nama_materi)" readonly />
                                        <x-input-error :messages="$errors->get('nama_materi')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Deskripsi Singkat -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                        <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text"
                                            name="deskripsi_singkat" :value="old('deskripsi_singkat', $materi->deskripsi_singkat)" readonly />
                                        <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Deskripsi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                        <textarea id="deskripsi" class=" mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" readonly>{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                    </div>
                                    <!-- Modul -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="jumlah_siswa" :value="__('Modul')" />
                                            @if ($materi->modul)
                                                <a href="{{ route('modul.download', $materi->kode_materi) }}"  target="_blank"><button type="submit" class="btn btn-primary bg-primary"><i class="icon-folder mr-2"></i>Download Modul</button></a>
                                            @else
                                                <p>Tidak ada modul.</p>
                                            @endif
                                        <x-input-error :messages="$errors->get('jumlah_siswa')" class="mt-2 mb-2" />
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
