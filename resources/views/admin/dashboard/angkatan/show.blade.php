@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Angkatan</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/angkatan" class="text-white">Angkatan</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/angkatan" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/angkatan/{{ $angkatan->kode_angkatan }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Angkatan</a>
            <form action="/admin/angkatan/{{ $angkatan->kode_angkatan }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm bg-danger"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $angkatan->kode_angkatan }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Angkatan</button>
                <div class="modal fade" id="basicModal{{ $angkatan->kode_angkatan }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus angkatan tersebut?
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
                    {{ __('Data Angkatan') }}
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
                                    <!-- Kode Angkatan -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_angkatan" :value="__('Kode Angkatan')" />
                                        <x-text-input id="kode_angkatan" class="block mt-1 w-full" type="text"
                                            name="kode_angkatan" :value="old('kode_angkatan', $angkatan->kode_angkatan)" readonly />
                                        <x-input-error :messages="$errors->get('kode_angkatan')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Angkatan -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="angkatan" :value="__('Angkatan')" />
                                        <x-text-input id="angkatan" class="block mt-1 w-full" type="text"
                                            name="angkatan" :value="old('angkatan', $angkatan->angkatan)" readonly />
                                        <x-input-error :messages="$errors->get('angkatan')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Tanggal Masuk -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
                                        <x-text-input id="tanggal_masuk" class="block mt-1 w-full" type="text"
                                            name="tanggal_masuk" :value="old('tanggal_masuk', $angkatan->tanggal_masuk)" readonly />
                                        <x-input-error :messages="$errors->get('tanggal_masuk')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Tanggal Lulus -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="tanggal_lulus" :value="__('Tanggal Lulus')" />
                                        <x-text-input id="tanggal_lulus" class="block mt-1 w-full" type="text"
                                            name="tanggal_lulus" :value="old('tanggal_lulus', $angkatan->tanggal_lulus)" readonly />
                                        <x-input-error :messages="$errors->get('tanggal_lulus')" class="mt-2 mb-2" />
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
