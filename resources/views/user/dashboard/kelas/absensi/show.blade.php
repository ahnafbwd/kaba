@extends('user.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Presensi</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/user/absensi" class="text-white">Absensi</a></li>
                    <li class="breadcrumb-item active text-white">Presensi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>
                <form method="post" action="{{ route('presensiuser.store', ['kodeabsensi' => $absensi->kode_absensi]) }}">
                    @csrf
                    <div class="col">
                        <!-- Status Kehadiran -->
                        <div class="row">
                            <div class="col">
                                <div class="row-lg-6 mt-2">
                                    <x-input-label for="status_kehadiran" :value="__('Status Kehadiran')" />
                                    <select id="status_kehadiran" name="status_kehadiran"
                                        class="block appearance-none w-full py-2 px-3 text-primary border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Hadir" class="text-primary">Hadir</option>
                                        <option value="Sakit" class="text-primary">Sakit</option>
                                        <option value="Izin" class="text-primary">Izin</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status_kehadiran')" class="mt-2" />
                                </div>
                                <!-- Keterangan -->
                                <div class="row-lg-6 mt-2">
                                    <x-input-label for="keterangan" :value="__('Keterangan')" />
                                    <textarea id="keterangan"
                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="keterangan">{{ old('keterangan') }}</textarea>
                                    <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="ml-4 bg-info">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
