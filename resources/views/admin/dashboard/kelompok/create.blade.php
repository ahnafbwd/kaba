@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Kelas</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/kelompok" class="text-white">Kelas</a></li>
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
                                        {{ __('Data Kelas') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        kelas</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/kelompok/">
                                    @csrf
                                    <div class="row">
                                            <!-- Nama Kelas -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                                                <x-text-input id="nama_kelas" class="block mt-1 w-full" type="text" name="nama_kelas" :value="old('nama_kelas')" required />
                                                <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2" />
                                            </div>
                                            <!-- Kode Program -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="kode_program" :value="__('Program')" />
                                                <select id="kode_program" name="kode_program" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($programs as $program)
                                                        <option value="{{ $program->kode_program }}">{{ $program->nama_program }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('kode_program')" class="mt-2" />
                                            </div>


                                            <!-- Jumlah Siswa -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="jumlah_siswa" :value="__('Jumlah Siswa')" />
                                                <x-text-input id="jumlah_siswa" class="block mt-1 w-full" type="number" name="jumlah_siswa" :value="old('jumlah_siswa')" required />
                                                <x-input-error :messages="$errors->get('jumlah_siswa')" class="mt-2" />
                                            </div>
                                            <!-- Kode Angkatan -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="kode_angkatan" :value="__('Angkatan')" />
                                                <select id="kode_angkatan" name="kode_angkatan" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($angkatans as $angkatan)
                                                        <option value="{{ $angkatan->kode_angkatan }}">{{ $angkatan->angkatan }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('kode_angkatan')" class="mt-2" />
                                            </div>

                                            <!-- Link WA -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="link_wa" :value="__('Link Grup Whatsapp')" />
                                                <x-text-input id="link_wa" class="block mt-1 w-full" type="text" name="link_wa" :value="old('link_wa')" required />
                                                <x-input-error :messages="$errors->get('link_wa')" class="mt-2" />
                                            </div>
                                            <!-- Deskripsi -->
                                            <div class="col-lg-6 mt-2">
                                                <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                                <textarea id="deskripsi" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
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
