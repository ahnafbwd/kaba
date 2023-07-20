@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Edit Kelas</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/kelompok" class="text-white">Kelas</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/kelompok" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
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
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <!-- Page Heading -->
                                <div class="items-center justify-center">
                                    <h2 class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                        {{ __('Data Kelas') }}
                                    </h2>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/kelompok/{{ $kelompok->kode_kelas }}">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Kelas -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                                            <x-text-input id="nama_kelas" class="block mt-1 w-full" type="text"
                                                name="nama_kelas" :value="old('nama_kelas', $kelompok->nama_kelas)" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2" />
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_program" :value="__('Program')" />
                                            <select id="kode_program" name="kode_program" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($programs as $program)
                                                <option value="{{ $program->kode_program }}" {{ $kelompok->kode_program === $program->kode_program ? 'selected' : '' }}>{{ $program->nama_program }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_program')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Jumlah Siswa -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="jumlah_siswa" :value="__('Jumlah Siswa')" />
                                            <x-text-input id="jumlah_siswa" class="block mt-1 w-full" type="number" name="jumlah_siswa" :value="old('jumlah_siswa', $kelompok->jumlah_siswa)" required />
                                            <x-input-error :messages="$errors->get('jumlah_siswa')" class="mt-2" />
                                        </div>
                                        <!-- Kode Angkatan -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_angkatan" :value="__('Angkatan')" />
                                            <select id="kode_angkatan" name="kode_angkatan" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($angkatans as $angkatan)
                                                <option value="{{ $angkatan->kode_angkatan }}" {{ $kelompok->kode_angkatan === $angkatan->kode_angkatan ? 'selected' : '' }}>{{ $angkatan->angkatan }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_angkatan')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Link WA -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="link_wa" :value="__('Link Grup Whatsapp')" />
                                            <x-text-input id="link_wa" class="block mt-1 w-full" type="text" name="link_wa" :value="old('link_wa', $kelompok->link_wa)" required />
                                            <x-input-error :messages="$errors->get('link_wa')" class="mt-2" />
                                        </div>
                                        <!-- Status Kelas -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="status_kelas" :value="__('Status Kelas')" />
                                            <select id="status_kelas" name="status_kelas"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Aktif"
                                                    {{ $kelompok->status_kelas === 'Aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="Tidak Aktif"
                                                    {{ $kelompok->status_kelas === 'Tidak Aktif' ? 'selected' : '' }}>
                                                    Tidak Aktif
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status_kelas')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Deskripsi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                            <textarea id="deskripsi" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" required>{{ old('deskripsi', $kelompok->deskripsi) }}</textarea>
                                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
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
