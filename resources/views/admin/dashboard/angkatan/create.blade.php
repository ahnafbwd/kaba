@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Angkatan</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/angkatan" class="text-white">Angkatan</a></li>
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
                                        {{ __('Data Angkatan') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        angkatan</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/angkatan/">
                                    @csrf
                                    <div class="row">
                                        <!-- Angkatan -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="angkatan" :value="__('Angkatan')" />
                                            <x-text-input id="angkatan" class="block mt-1 w-full" type="text"
                                                name="angkatan" :value="old('angkatan')" required />
                                            <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
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
