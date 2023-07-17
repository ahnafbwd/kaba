@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Program</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/program" class="text-white">Program</a></li>
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
                                        {{ __('Data Program') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data program</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/program/">
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Program -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_program" :value="__('Nama Program')" />
                                            <x-text-input id="nama_program" class="block mt-1 w-full" type="text" name="nama_program" :value="old('nama_program')" required />
                                            <x-input-error :messages="$errors->get('nama_program')" class="mt-2" />
                                        </div>
                                        <!-- Kode Tingkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_tingkat" :value="__('Tingkat')" />
                                            <select id="kode_tingkat" name="kode_tingkat" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($tingkats as $tingkat)
                                                    <option value="{{ $tingkat->kode_tingkat }}">{{ $tingkat->nama_tingkat }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_tingkat')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Deskripsi Singkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                            <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text" name="deskripsi_singkat" :value="old('deskripsi_singkat')" required />
                                            <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2" />
                                        </div>
                                        <!-- Kode Jadwal -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_jadwal" :value="__('Kode Jadwal')" />
                                            <select id="kode_jadwal" name="kode_jadwal" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($jadwals as $jadwal)
                                                    <option value="{{ $jadwal->kode_jadwal }}">{{ $jadwal->kode_jadwal }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_jadwal')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Harga -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="harga" :value="__('Harga')" />
                                            <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" :value="old('harga')" required />
                                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                                        </div>

                                        <!-- Kuota Siswa -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kuota_siswa" :value="__('Kuota Siswa')" />
                                            <x-text-input id="kuota_siswa" class="block mt-1 w-full" type="number" name="kuota_siswa" :value="old('kuota_siswa')" required />
                                            <x-input-error :messages="$errors->get('kuota_siswa')" class="mt-2" />
                                        </div>

                                    </div>

                                    <div class="row">
                                        <!-- Deskripsi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                            <textarea id="deskripsi" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                        </div>
                                        <!-- Materi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_materi" :value="__('Materi')" />
                                            <ul id="kode_materi" name="kode_materi[]" class="list-group block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                @foreach ($materis as $materi)
                                                    <li class="list-group-item border-0">
                                                        <input class="form-check-input" type="checkbox" name="kode_materi[]" value="{{ $materi->kode_materi }}">
                                                        {{ $materi->nama_materi }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
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
