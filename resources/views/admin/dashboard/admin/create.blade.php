@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Admin</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/admin" class="text-white">Admin</a></li>
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
                                        {{ __('Data Admin') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        admin</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/admin/">
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Lengkap -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                                name="nama_lengkap" :value="old('nama_lengkap')" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                                        </div>
                                        <!-- Email -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                name="email" :value="old('email')" required autocomplete="email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Password -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <!-- Nomer Telepon -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
                                            <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text"
                                                name="nomer_telepon" :value="old('nomer_telepon')" required />
                                            <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Confirm Password -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password" name="password_confirmation" required
                                                autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
