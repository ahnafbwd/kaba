@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Tingkat</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/tingkat" class="text-white">Tingkat</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/tingkat" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/tingkat/{{ $tingkat->kode_tingkat }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Tingkat</a>
            <form action="/admin/tingkat/{{ $tingkat->kode_tingkat }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $tingkat->kode_tingkat }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Tingkat</button>
                <div class="modal fade" id="basicModal{{ $tingkat->kode_tingkat }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus tingkat tersebut?
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
                    {{ __('Data Tingkat') }}
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
                                    <!-- Kode Tingkat -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_tingkat" :value="__('Kode Tingkat')" />
                                        <x-text-input id="kode_tingkat" class="block mt-1 w-full" type="text"
                                            name="kode_tingkat" :value="old('kode_tingkat', $tingkat->kode_tingkat)" readonly />
                                        <x-input-error :messages="$errors->get('kode_tingkat')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama Tingkat -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_tingkat" :value="__('Nama Tingkat')" />
                                        <x-text-input id="nama_tingkat" class="block mt-1 w-full" type="text"
                                            name="nama_tingkat" :value="old('nama_tingkat', $tingkat->nama_tingkat)" readonly />
                                        <x-input-error :messages="$errors->get('nama_tingkat')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Ikon -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="ikon" :value="__('Ikon')" />
                                        <x-text-input id="ikon" class="block mt-1 w-full" type="text"
                                            name="ikon" :value="old('ikon', $tingkat->ikon)" readonly />
                                        <x-input-error :messages="$errors->get('ikon')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Deskripsi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                        <textarea id="deskripsi"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="deskripsi" readonly>{{ old('deskripsi', $tingkat->deskripsi) }}</textarea>
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
