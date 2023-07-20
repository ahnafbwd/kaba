@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Kelas</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/kelompok" class="text-white">Kelas</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/admin/kelompok" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="/admin/kelompok/{{ $kelompok->kode_kelas }}/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Kelas</a>
            <form action="/admin/kelompok/{{ $kelompok->kode_kelas }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm bg-danger"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $kelompok->kode_kelas }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Kelas</button>
                <div class="modal fade" id="basicModal{{ $kelompok->kode_kelas }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus kelas tersebut?
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
                    {{ __('Data Kelas') }}
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
                                    <!-- Kode Kelas -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_kelas" :value="__('Kode Kelas')" />
                                        <x-text-input id="kode_kelas" class="block mt-1 w-full" type="text"
                                            name="kode_kelas" :value="old('kode_kelas', $kelompok->kode_kelas)" readonly />
                                        <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama Kelas -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kelas" :value="__('Nama Kelas')" />
                                        <x-text-input id="kelas" class="block mt-1 w-full" type="text"
                                            name="kelas" :value="old('kelas', $kelompok->nama_kelas)" readonly />
                                        <x-input-error :messages="$errors->get('kelas')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Nama Program -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_program" :value="__('Nama Program')" />
                                        <x-text-input id="kode_program" class="block mt-1 w-full" type="text"
                                            name="kode_program" :value="old('kode_program', $program->nama_program)" readonly />
                                        <x-input-error :messages="$errors->get('kode_program')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Jumlah siswa -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="jumlah_siswa" :value="__('Jumlah siswa')" />
                                        <x-text-input id="jumlah_siswa" class="block mt-1 w-full" type="text"
                                            name="jumlah_siswa" :value="old('jumlah_siswa', $kelompok->jumlah_siswa)" readonly />
                                        <x-input-error :messages="$errors->get('jumlah_siswa')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Angkatan -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_angkatan" :value="__('Angkatan')" />
                                        <x-text-input id="kode_angkatan" class="block mt-1 w-full" type="text"
                                            name="kode_angkatan" :value="old('kode_angkatan', $angkatan->angkatan)" readonly />
                                        <x-input-error :messages="$errors->get('kode_angkatan')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Status Kelas -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="status_kelas" :value="__('Status Kelas')" />
                                        <x-text-input id="status_kelas" class="block mt-1 w-full" type="text"
                                            name="status_kelas" :value="old('status_kelas', $kelompok->status_kelas)" readonly />
                                        <x-input-error :messages="$errors->get('status_kelas')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Link WA -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="link_wa" :value="__('Link Grup Whatsapp')" />
                                        <x-text-input id="link_wa" class="block mt-1 w-full" type="text" name="link_wa" :value="old('link_wa', $kelompok->link_wa)" readonly />
                                        <x-input-error :messages="$errors->get('link_wa')" class="mt-2" />
                                    </div>
                                    <!-- Deskripsi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                        <textarea id="deskripsi" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" readonly>{{ old('deskripsi', $kelompok->deskripsi) }}</textarea>
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
