@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Pengajaran</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/pengajaran" class="text-white">Pengajaran</a></li>
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
                                        {{ __('Data Pengajaran') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        pengajaran</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/pengajaran/">
                                    @csrf
                                    <div class="row">
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
                                        <!-- Kode Pengajar -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_pengajar" :value="__('Pengajar')" />
                                            <select id="kode_pengajar" name="kode_pengajar" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($pengajars as $pengajar)
                                                    <option value="{{ $pengajar->kode_pengajar }}">{{ $pengajar->nama_lengkap }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_pengajar')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Hari -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="hari" :value="__('Hari')" />
                                            <select id="hari" name="hari" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Minggu">Minggu</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                                        </div>
                                        <!-- Kode Waktu -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_waktu" :value="__('Waktu')" />
                                            <select id="kode_waktu" name="kode_waktu" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($waktus as $waktu)
                                                    <option value="{{ $waktu->kode_waktu }}">{{ $waktu->nama_waktu }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_waktu')" class="mt-2" />
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
