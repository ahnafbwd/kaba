@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Edit Pengajar</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/pengajar" class="text-white">Pengajar</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/dashboard/pengajar" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                <form action="/admin/dashboard/pengajar/{{ $pengajar->kode_pengajar }}" method="post" class="d-inline">
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
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <!-- Page Heading -->
                                <div class="items-center justify-center">
                                    <h2 class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                        {{ __('Data Pengajar') }}
                                    </h2>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/pengajar/{{ $pengajar->kode_pengajar }}">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Lengkap -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                                name="nama_lengkap" :value="old('nama_lengkap', $pengajar->nama_lengkap)" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                                        </div>

                                        <!-- Email -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                name="email" :value="old('email', $pengajar->email)" required autocomplete="email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Nomer Telepon -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
                                            <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text"
                                                name="nomer_telepon" :value="old('nomer_telepon', $pengajar->nomer_telepon)" required />
                                            <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2" />
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                            <select id="jenis_kelamin" name="jenis_kelamin"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Laki-laki"
                                                    {{ $pengajar->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ $pengajar->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Tanggal Lahir -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                                            <x-date-input id="tanggal_lahir" class="block mt-1 w-full" type="date"
                                                name="tanggal_lahir" :value="old('tanggal_lahir', $pengajar->tanggal_lahir)" required autocomplete="off" />
                                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                                        </div>
                                        <!-- Status Kerja -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="status_kerja" :value="__('Status Kerja')" />
                                            <select id="status_kerja" name="status_kerja"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Aktif"
                                                    {{ $pengajar->status_kerja === 'Aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="Tidak Aktif"
                                                    {{ $pengajar->status_kerja === 'Tidak Aktif' ? 'selected' : '' }}>
                                                    Tidak Aktif
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status_kerja')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Alamat -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="alamat" :value="__('Alamat')" />
                                            <textarea id="alamat"
                                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="alamat" required>{{ old('alamat', $pengajar->alamat) }}</textarea>
                                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center mt-4">
                                        <x-primary-button class="ml-4 bg-info">
                                            {{ __('Simpan') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
