@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Pengajar</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/pengajar" class="text-white">Pengajar</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/pengajar" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/pengajar/{{ $pengajar->kode_pengajar }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Pengajar</a>
            <form action="/admin/pengajar/{{ $pengajar->kode_pengajar }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $pengajar->kode_pengajar }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Pengajar</button>
                <div class="modal fade" id="basicModal{{ $pengajar->kode_pengajar }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus akun pengajar tersebut?
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
                    {{ __('Data Pengajar') }}
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
                                    <!-- Kode Pengajar -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_pengajar" :value="__('Kode Pengajar')" />
                                        <x-text-input id="kode_pengajar" class="block mt-1 w-full" type="text"
                                            name="kode_pengajar" :value="old('kode_pengajar', $pengajar->kode_pengajar)" readonly />
                                        <x-input-error :messages="$errors->get('kode_pengajar')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama Pengajar -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_lengkap" :value="__('Nama Pengajar')" />
                                        <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                            name="nama_lengkap" :value="old('nama_lengkap', $pengajar->nama_lengkap)" readonly />
                                        <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Email -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="text"
                                            name="email" :value="old('email', $pengajar->email)" readonly />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nomer Telepon -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
                                        <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text"
                                            name="nomer_telepon" :value="old('nomer_telepon', $pengajar->nomer_telepon)" readonly />
                                        <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2 mb-2" />
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- Jenis Kelamin -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                        <x-text-input id="jenis_kelamin" class="block mt-1 w-full" type="text"
                                            name="jenis_kelamin" :value="old('jenis_kelamin', $pengajar->jenis_kelamin)" readonly />
                                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Tanggal Lahir -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="text"
                                            name="tanggal_lahir" :value="old('tanggal_lahir', $pengajar->tanggal_lahir)" readonly />
                                        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2 mb-2" />
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- Alamat -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="alamat" :value="__('Alamat')" />
                                        <textarea id="alamat" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat" readonly>{{ old('alamat', $pengajar->alamat) }}</textarea>
                                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                    </div>
                                    <!-- Status Kerja -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="status_kerja" :value="__('Status Pengajar')" />
                                        <x-text-input id="status_kerja" class="block mt-1 w-full" type="text"
                                            name="status_kerja" :value="old('status_kerja', $pengajar->status_kerja)" readonly />
                                        <x-input-error :messages="$errors->get('status_kerja')" class="mt-2 mb-2" />
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
