@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Tingkat</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/tingkat" class="text-white">Tingkat</a></li>
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
                                        {{ __('Data Tingkat') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        tingkat</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/tingkat/">
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Tingkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_tingkat" :value="__('Nama Tingkat')" />
                                            <x-text-input id="nama_tingkat" class="block mt-1 w-full" type="text"
                                                name="nama_tingkat" :value="old('nama_tingkat')" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_tingkat')" class="mt-2" />
                                        </div>

                                        <!-- Ikon -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="ikon" :value="__('Ikon')" />
                                            <x-text-input id="ikon" class="block mt-1 w-full" type="text"
                                                name="ikon" :value="old('ikon')" required autofocus />
                                            <x-input-error :messages="$errors->get('ikon')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Deskripsi -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                            <textarea id="deskripsi"
                                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
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
