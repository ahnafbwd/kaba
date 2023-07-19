@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Materi</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/materi" class="text-white">Materi</a></li>
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
                                        {{ __('Data Materi') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        materi</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/materi/" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Materi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_materi" :value="__('Nama Materi')" />
                                            <x-text-input id="nama_materi" class="block mt-1 w-full" type="text" name="nama_materi"
                                                :value="old('nama_materi')" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_materi')" class="mt-2" />
                                        </div>

                                        <!-- Deskripsi Singkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                            <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text" name="deskripsi_singkat"
                                                :value="old('deskripsi_singkat')" required autofocus />
                                            <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Deskripsi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                            <textarea id="deskripsi"
                                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                        </div>
                                        <!-- Modul -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="modul" :value="__('Modul')" />
                                              <div class="input-group block mt-1 w-full mb-3">
                                                <input type="file" class="form-control " id="modul" placeholder="Upload Modul" name="modul" required>
                                                <label class="input-group-text bg-dark text-white " for="modul">Upload</label>
                                              </div>

                                            <x-input-error :messages="$errors->get('modul')" class="mt-2" />
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
