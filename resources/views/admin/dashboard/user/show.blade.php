@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi User</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/user" class="text-white">User</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/user" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/user/{{ $user->kode_user }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit User</a>
            <form action="/admin/user/{{ $user->kode_user }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm bg-danger"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->kode_user }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus User</button>
                <div class="modal fade" id="basicModal{{ $user->kode_user }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus akun user tersebut?
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
                    {{ __('Data User') }}
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
                                    <!-- Kode User -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_user" :value="__('Kode User')" />
                                        <x-text-input id="kode_user" class="block mt-1 w-full" type="text"
                                            name="kode_user" :value="old('kode_user', $user->kode_user)" readonly />
                                        <x-input-error :messages="$errors->get('kode_user')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama User -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                                        <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                            name="nama_lengkap" :value="old('nama_lengkap', $user->nama_lengkap)" readonly />
                                        <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Email -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="text"
                                            name="email" :value="old('email', $user->nama_lengkap)" readonly />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nomer Telepon -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
                                        <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text"
                                            name="nomer_telepon" :value="old('nomer_telepon', $user->nomer_telepon)" readonly />
                                        <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2 mb-2" />
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- Jenis Kelamin -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                        <x-text-input id="jenis_kelamin" class="block mt-1 w-full" type="text"
                                            name="jenis_kelamin" :value="old('jenis_kelamin', $user->jenis_kelamin)" readonly />
                                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Tanggal Lahir -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="text"
                                            name="tanggal_lahir" :value="old('tanggal_lahir', $user->tanggal_lahir)" readonly />
                                        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Alamat -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="alamat" :value="__('Alamat')" />
                                        <textarea id="alamat" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat" readonly>{{ old('alamat', $user->alamat) }}</textarea>
                                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
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
