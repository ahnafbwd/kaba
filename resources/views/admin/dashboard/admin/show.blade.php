@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Informasi Admin</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/admin" class="text-white">Admin</a></li>
                    <li class="breadcrumb-item active text-white">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/dashboard/admin" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                <a href="/admin/dashboard/admin/{{ $admin->kode_admin }}/edit"
                    class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                        class="fas fa-edit fa-sm text-white-100"></i> Edit Admin</a>
                <form action="/admin/dashboard/admin/{{ $admin->kode_admin }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#basicModal{{ $admin->kode_admin }}"><i
                            class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Admin</button>
                    <div class="modal fade" id="basicModal{{ $admin->kode_admin }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Kamu yakin menghapus akun admin tersebut?
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
                        {{ __('Data Admin') }}
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
                                        <!-- Kode Admin -->
                                        <div class="col-lg-6 mt-2 mb-2">
                                            <x-input-label for="kode_admin" :value="__('Kode Admin')" />
                                            <x-text-input id="kode_admin" class="block mt-1 w-full" type="text"
                                                name="kode_admin" :value="old('kode_admin', $admin->kode_admin)" readonly />
                                            <x-input-error :messages="$errors->get('kode_admin')" class="mt-2 mb-2" />
                                        </div>
                                        <!-- Nama Lengkap -->
                                        <div class="col-lg-6 mt-2 mb-2">
                                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                                name="nama_lengkap" :value="old('nama_lengkap', $admin->nama_lengkap)" readonly />
                                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2 mb-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Email -->
                                        <div class="col-lg-6 mt-2 mb-2">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                name="email" :value="old('email', $admin->email)" readonly />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 mb-2" />
                                        </div>
                                        <!-- Nomer Telepon -->
                                        <div class="col-lg-6 mt-2 mb-2">
                                            <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
                                            <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text"
                                                name="nomer_telepon" :value="old('nomer_telepon', $admin->nomer_telepon)" readonly />
                                            <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2 mb-2" />
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
