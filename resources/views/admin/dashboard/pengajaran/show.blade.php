@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Pengajaran</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/kurikulum" class="text-white">Pengajaran</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/kurikulum" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/kurikulum/{{ $pengajaran->kode_pengajaran }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Pengajaran</a>
            <form action="/admin/kurikulum/{{ $pengajaran->kode_pengajaran }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $pengajaran->kode_pengajaran }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Pengajarana</button>
                <div class="modal fade" id="basicModal{{ $pengajaran->kode_pengajaran }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus akun pengajaran tersebut?
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
                    {{ __('Data Pengajaran') }}
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
                                    <!-- Kode Pengajaran -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_pengajaran" :value="__('Kode Pengajaran')" />
                                        <x-text-input id="kode_pengajaran" class="block mt-1 w-full" type="text"
                                            name="kode_pengajaran" :value="old('kode_pengajaran', $pengajaran->kode_pengajaran)" readonly />
                                        <x-input-error :messages="$errors->get('kode_pengajaran')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Materi -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_materi" :value="__('Materi')" />
                                        <x-text-input id="kode_materi" class="block mt-1 w-full" type="text"
                                            name="kode_materi" :value="old('kode_materi', $pengajaran->kode_materi)" readonly />
                                        <x-input-error :messages="$errors->get('kode_materi')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Kode Pengajar -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_pengajar" :value="__('Kode Pengajar')" />
                                        <x-text-input id="kode_pengajar" class="block mt-1 w-full" type="text"
                                            name="kode_pengajar" :value="old('kode_pengajar', $pengajaran->kode_pengajar)" readonly />
                                        <x-input-error :messages="$errors->get('kode_pengajar')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Hari -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="hari" :value="__('Hari')" />
                                        <x-text-input id="hari" class="block mt-1 w-full" type="text"
                                            name="hari" :value="old('hari', $pengajaran->hari)" readonly />
                                        <x-input-error :messages="$errors->get('hari')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Kode Waktu -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_waktu" :value="__('Kode Waktu')" />
                                        <x-text-input id="kode_waktu" class="block mt-1 w-full" type="text"
                                            name="kode_waktu" :value="old('kode_waktu', $pengajaran->kode_waktu)" readonly />
                                        <x-input-error :messages="$errors->get('kode_waktu')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Status Pengajaran -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="status_pengajaran" :value="__('Status Pengajaran')" />
                                        <x-text-input id="status_pengajaran" class="block mt-1 w-full" type="text"
                                            name="status_pengajaran" :value="old('status_pengajaran', $pengajaran->status_pengajaran)" readonly />
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
