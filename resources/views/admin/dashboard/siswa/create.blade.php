@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Siswa</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/siswa" class="text-white">Siswa</a></li>
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
                                        {{ __('Data Siswa') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data siswa</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/siswa">
                                    @csrf
                                    <div class="row">
                                        <!-- Kode User -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_user" :value="__('User')" />
                                            <select id="kode_user" name="kode_user" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->kode_user }}">{{ $user->nama_lengkap }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_user')" class="mt-2" />
                                        </div>
                                        <!-- Kode Pendaftaran -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_pendaftaran" :value="__('Pendaftaran')" />
                                            <select id="kode_pendaftaran" name="kode_pendaftaran" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($pendaftarans as $pendaftaran)
                                                    <option value="{{ $pendaftaran->kode_pendaftaran }}">{{ $pendaftaran->kode_pendaftaran }} - {{ $pendaftaran->user->nama_lengkap }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_pendaftaran')" class="mt-2" />
                                        </div>
                                        <!-- Kode Kelas -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_kelas" :value="__('kelas')" />
                                            <select id="kode_kelas" name="kode_kelas" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($kelompoks as $kelas)
                                                    <option value="{{ $kelas->kode_kelas }}">{{ $kelas->nama_kelas }} - {{ $kelas->program->nama_program }} - {{ $kelas->program->tingkat->nama_tingkat }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2" />
                                        </div>
                                        <!-- Status Siswa -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="status_siswa" :value="__('Status Siswa')" />
                                            <select id="status_siswa" name="status_siswa"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status_siswa')" class="mt-2" />
                                        </div>
                                        <!-- Tanggal Masuk -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
                                            <x-date-input id="tanggal_masuk" class="block mt-1 w-full" type="date"
                                                name="tanggal_masuk" :value="old('tanggal_masuk')" required autocomplete="off" />
                                            <x-input-error :messages="$errors->get('tanggal_masuk')" class="mt-2" />
                                        </div>
                                        <!-- Tanggal Lulus -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="tanggal_lulus" :value="__('Tanggal Lulus')" />
                                            <x-date-input id="tanggal_lulus" class="block mt-1 w-full" type="date"
                                                name="tanggal_lulus" :value="old('tanggal_lulus')" autocomplete="off" />
                                            <x-input-error :messages="$errors->get('tanggal_lulus')" class="mt-2" />
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
