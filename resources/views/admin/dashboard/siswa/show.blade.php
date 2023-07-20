@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Informasi Siswa</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/siswa" class="text-white">Siswa</a></li>
                    <li class="breadcrumb-item active text-white">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/siswa" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                <a href="/admin/siswa/{{ $siswa->kode_siswa }}/edit"
                    class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                        class="fas fa-edit fa-sm text-white-100"></i> Edit Siswa</a>
                <form action="/admin/siswa/{{ $siswa->kode_siswa }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm bg-danger"
                        data-bs-toggle="modal" data-bs-target="#basicModal{{ $siswa->kode_siswa }}"><i
                            class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Siswa</button>
                    <div class="modal fade" id="basicModal{{ $siswa->kode_siswa }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Kamu yakin menghapus siswa tersebut?
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
                        {{ __('Data Siswa') }}
                    </h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Kode User -->
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="kode_user" :value="__('Kode User')" />
                        <x-text-input id="kode_user" class="block mt-1 w-full" type="text" name="kode_user"
                            :value="old('kode_user', $siswa->kode_user)" readonly />
                        <x-input-error :messages="$errors->get('kode_user')" class="mt-2 mb-2" />
                    </div>
                    <!-- Kode Pendaftaran -->
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="kode_pendaftaran" :value="__('Kode Pendaftaran')" />
                        <x-text-input id="kode_pendaftaran" class="block mt-1 w-full" type="text" name="kode_pendaftaran"
                            :value="old('kode_pendaftaran', $siswa->kode_pendaftaran)" readonly />
                        <x-input-error :messages="$errors->get('kode_pendaftaran')" class="mt-2 mb-2" />
                    </div>
                    <!-- Kode Kelas -->
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="kode_kelas" :value="__('Kode Kelas')" />
                        <x-text-input id="kode_kelas" class="block mt-1 w-full" type="text" name="kode_kelas"
                            :value="old('kode_kelas', $siswa->kode_kelas)" readonly />
                        <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2 mb-2" />
                    </div>
                    <!-- Status Siswa -->
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="status_siswa" :value="__('Status Siswa')" />
                        <x-text-input id="status_siswa" class="block mt-1 w-full" type="text" name="status_siswa"
                            :value="old('status_siswa', $siswa->status_siswa)" readonly />
                        <x-input-error :messages="$errors->get('status_siswa')" class="mt-2 mb-2" />
                    </div>
                    <!-- Tanggal Masuk -->
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
                        <x-text-input id="tanggal_masuk" class="block mt-1 w-full" type="text" name="tanggal_masuk"
                            :value="old('tanggal_masuk', $siswa->tanggal_masuk)" readonly />
                        <x-input-error :messages="$errors->get('tanggal_masuk')" class="mt-2 mb-2" />
                    </div>
                    <!-- Tanggal Lulus -->
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="tanggal_lulus" :value="__('Tanggal Lulus')" />
                        <x-text-input id="tanggal_lulus" class="block mt-1 w-full" type="text" name="tanggal_lulus"
                            :value="old('tanggal_lulus', $siswa->tanggal_lulus)" readonly />
                        <x-input-error :messages="$errors->get('tanggal_lulus')" class="mt-2 mb-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
