@extends('pengajar.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Tugas</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pengajar/tugas" class="text-white">Tugas</a></li>
                    <li class="breadcrumb-item active text-white">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <!-- Page Heading -->
                                <div class="items-center justify-center">
                                    <h2 class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                        {{ __('Data Tugas') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        tugas</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/pengajar/tugas/">
                                    @csrf
                                    <div class="row">
                                            <!-- Nama Tugas -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="nama_tugas" :value="__('Nama Tugas')" />
                                                <x-text-input id="nama_tugas" class="block mt-1 w-full" type="text" name="nama_tugas" :value="old('nama_tugas')" required />
                                                <x-input-error :messages="$errors->get('nama_tugas')" class="mt-2" />
                                            </div>
                                            <!-- Kode Kelas -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="kode_kelas" :value="__('Kelas')" />
                                                <select id="kode_kelas" name="kode_kelas" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($kelompoks as $kelompok)
                                                        <option value="{{ $kelompok->kode_kelas }}">{{ $kelompok->nama_kelas }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2" />
                                            </div>
                                            <!-- Kode Materi -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="kode_materi" :value="__('Materi')" />
                                                <select id="kode_materi" name="kode_materi" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($materis as $materi)
                                                        <option value="{{ $materi->kode_materi }}">{{ $materi->nama_materi }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                            </div>
                                            <!-- Tanggal Pengumpulan -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="tanggal_pengumpulan" :value="__('Tanggal Pengumpulan')" />
                                                <x-date-input id="tanggal_pengumpulan" class="block mt-1 w-full" type="date"
                                                    name="tanggal_pengumpulan" :value="old('tanggal_pengumpulan')" required autocomplete="off" />
                                                <x-input-error :messages="$errors->get('tanggal_pengumpulan')" class="mt-2" />
                                            </div>
                                            <!-- Deskripsi -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                                <textarea id="deskripsi" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                            </div>
                                            <!-- Keterangan -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="keterangan" :value="__('Keterangan')" />
                                                <textarea id="keterangan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="keterangan" required>{{ old('keterangan') }}</textarea>
                                                <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                            </div>

                                    <div class="col flex align-items-center justify-content-center mt-4">
                                        <x-primary-button class=" bg-primary">
                                            {{ __('Tambah') }}
                                        </x-primary-button>
                                    </div>
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
