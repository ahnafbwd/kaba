@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Waktu</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/dashboard/waktu" class="text-white">Waktu</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/dashboard/waktu" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/dashboard/waktu/{{ $waktu->kode_waktu }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Waktu</a>
            <form action="/admin/dashboard/waktu/{{ $waktu->kode_waktu }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $waktu->kode_waktu }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Waktu</button>
                <div class="modal fade" id="basicModal{{ $waktu->kode_waktu }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus waktu tersebut?
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
                    {{ __('Data Waktu') }}
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
                                    <!-- Kode Waktu -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_waktu" :value="__('Kode Waktu')" />
                                        <x-text-input id="kode_waktu" class="block mt-1 w-full" type="text"
                                            name="kode_waktu" :value="old('kode_waktu', $waktu->kode_waktu)" readonly />
                                        <x-input-error :messages="$errors->get('kode_waktu')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama Waktu -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_waktu" :value="__('Nama Waktu')" />
                                        <x-text-input id="nama_waktu" class="block mt-1 w-full" type="text"
                                            name="nama_waktu" :value="old('nama_waktu', $waktu->nama_waktu)" readonly />
                                        <x-input-error :messages="$errors->get('nama_waktu')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Waktu Mulai -->
                                    <div class="col-lg-6 mt-2">
                                        <label for="waktu_mulai" class="block font-medium text-sm text-gray-700">Waktu Mulai</label>
                                        <x-time-picker-input id="waktu_mulai" class="block mt-1 w-full" type="time" name="waktu_mulai"
                                            :value="old('waktu_mulai', $waktu->waktu_mulai)" readonly />
                                        @error('waktu_mulai')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Waktu Berakhir -->
                                    <div class="col-lg-6 mt-2">
                                        <label for="waktu_berakhir" class="block font-medium text-sm text-gray-700">Waktu Berakhir</label>
                                        <x-time-picker-input id="waktu_berakhir" class="block mt-1 w-full" type="time" name="waktu_berakhir"
                                            :value="old('waktu_berakhir', $waktu->waktu_berakhir)" readonly />
                                        @error('waktu_berakhir')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                <div class="row">
                                    <!-- Durasi dalam Menit -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="durasiInput" :value="__('Durasi (Menit)')" />
                                        <x-text-input id="durasiInput" class="block mt-1 w-full" type="text"
                                            name="durasi" :value="old('durasi', $waktu->durasi)" readonly />
                                        <x-input-error :messages="$errors->get('durasi')" class="mt-2" />
                                    </div>
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
