@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Jadwal</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/jadwal" class="text-white">Jadwal</a></li>
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
                                        {{ __('Data Jadwal') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        jadwal</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/jadwal/">
                                    @csrf
                                    <div class="row">
                                        <!-- Kode Pengajaran -->
                                        <div class="col">
                                            <div class="row-lg-6 mt-2">
                                                <x-input-label for="kode_pengajaran" :value="__('Kode Pengajaran')" />
                                                <select id="kode_pengajaran" name="kode_pengajaran"
                                                    class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($pengajarans as $pengajaran)
                                                        <option value="{{ $pengajaran->kode_pengajaran }}">
                                                            {{ $pengajaran->pengajar->nama_lengkap }} - {{ $pengajaran->materi->nama_materi }} - {{ $pengajaran->hari }} - {{ $pengajaran->waktu->nama_waktu }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('kode_pengajaran')" class="mt-2" />
                                            </div>
                                            <div class="row-lg-6 mt-2">
                                                <x-input-label for="kode_kelas" :value="__('Kelas')" />
                                                <select id="kode_kelas" name="kode_kelas"
                                                    class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($kelompoks as $kelompok)
                                                        <option value="{{ $kelompok->kode_kelas }}">
                                                            {{ $kelompok->nama_kelas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2" />
                                            </div>
                                            <!-- Ruangan -->
                                            <div class="row-lg-6 mt-2">
                                                <x-input-label for="ruangan" :value="__('Ruangan')" />
                                                <x-text-input id="ruangan" class="block mt-1 w-full" type="text" name="ruangan" :value="old('ruangan')" required />
                                                <x-input-error :messages="$errors->get('ruangan')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <table class="table table-bordered" id="informasiPengajaran" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <!-- Page Heading -->
                                                            <div class="items-center justify-center">
                                                                <h2
                                                                    class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                                                    {{ __('Informasi Pengajaran') }}
                                                                </h2>
                                                                <p class="font-semibold text-gray-800 text-center">Berikut
                                                                    informasi pengajaran</p>
                                                                <h6 class="font-semibold text-dark-800 leading-tight text-center">*pilih kode pengajaran terlebih dahulu</h6>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <h8>Materi : </h8>
                                                                <h8>Nama Pengajar : Ustadz </h8>
                                                                <h8>Hari : </h8>
                                                                <h8>Waktu : - WIB</h8>
                                                                <h8>Status Pengajaran : </h8>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center mt-4">
                                        <x-primary-button class="ml-4 bg-info">
                                            {{ __('Tambah') }}
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
