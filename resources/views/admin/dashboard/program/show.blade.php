@extends('admin.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="mb-2">Informasi Program</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/program" class="text-white">Program</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="{{ route('admin.program.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
            <a href="{{ route('admin.program.edit', $program->kode_program) }}"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-edit fa-sm text-white-100"></i> Edit Program</a>
            <form action="{{ route('admin.program.destroy', $program->kode_program) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm bg-danger"
                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $program->kode_program }}"><i
                        class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Pengajarana</button>
                <div class="modal fade" id="basicModal{{ $program->kode_program }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Kamu yakin menghapus program tersebut?
                            </div>
                            <div class="modal-footer align-items-center justify-content-center">
                                <button type="button" class="btn btn-dark border-1"
                                    data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Basic Modal-->
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h2 class="font-semibold text-xl text-white leading-tight text-center">
                    {{ __('Data Program') }}
                </h2>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <!-- Kode Program -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="program" :value="__('Kode Program')" />
                                        <x-text-input id="program" class="block mt-1 w-full" type="text"
                                            name="program" :value="old('program', $program->kode_program)" readonly />
                                        <x-input-error :messages="$errors->get('program')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Nama Program -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="nama_program" :value="__('Nama Program')" />
                                        <x-text-input id="nama_program" class="block mt-1 w-full" type="text"
                                            name="nama_program" :value="old('nama_program', $program->nama_program)" readonly />
                                        <x-input-error :messages="$errors->get('nama_program')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Kode Tingkat -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_tingkat" :value="__('Tingkat')" />
                                        <x-text-input id="kode_tingkat" class="block mt-1 w-full" type="text"
                                            name="kode_tingkat" :value="old('kode_tingkat', $program->tingkat->nama_tingkat)" readonly />
                                        <x-input-error :messages="$errors->get('kode_tingkat')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Deskripsi Singkat -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                        <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text"
                                            name="deskripsi_singkat" :value="old('deskripsi_singkat', $program->deskripsi_singkat)" readonly />
                                        <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Kode Jadwal -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kode_jadwal" :value="__('Kode Jadwal')" />
                                        <x-text-input id="kode_jadwal" class="block mt-1 w-full" type="text"
                                            name="kode_jadwal" :value="old('kode_jadwal', $program->kode_jadwal)" readonly />
                                        <x-input-error :messages="$errors->get('kode_jadwal')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Harga -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="harga" :value="__('Harga')" />
                                        <x-text-input id="harga" class="block mt-1 w-full" type="text"
                                            name="harga" :value="old('harga', $program->harga)" readonly />
                                        <x-input-error :messages="$errors->get('harga')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Status Program -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="status_program" :value="__('Status Program')" />
                                        <x-text-input id="status_program" class="block mt-1 w-full" type="text"
                                            name="status_program" :value="old('status_program', $program->status_program)" readonly />
                                        <x-input-error :messages="$errors->get('status_program')" class="mt-2 mb-2" />
                                    </div>
                                    <!-- Kuota Siswa -->
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <x-input-label for="kuota_siswa" :value="__('Kuota Siswa')" />
                                        <x-text-input id="kuota_siswa" class="block mt-1 w-full" type="text"
                                            name="kuota_siswa" :value="old('kuota_siswa', $program->kuota_siswa)" readonly />
                                        <x-input-error :messages="$errors->get('kuota_siswa')" class="mt-2 mb-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Materi -->
                                    {{-- <div class="col-lg-6 mt-2">
                                        <x-input-label for="kode_materi" :value="__('Materi')" />
                                        <ul id="kode_materi" name="kode_materi[]" class="list-group block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                                            @foreach ($program->materi as $materi)
                                                <li class="list-group-item border-0">
                                                    {{ $materi->nama_materi }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                    </div> --}}
                                    <!-- Materi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="kode_materi" :value="__('Materi')" />
                                        <ul id="kode_materi" name="kode_materi[]" class="list-group block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                                            @php
                                                $kodeMateris = explode(',', $program->kode_materi);
                                            @endphp
                                            @foreach ($kodeMateris as $kodeMateri)
                                                @php

                                                    $materi = \App\Models\Materi::where('kode_materi', $kodeMateri)->first();
                                                @endphp
                                                @if ($materi)
                                                    <li class="list-group-item border-0">
                                                        <div class="col pb-0 pt-0 mt-0 mb-2">
                                                            <i class="bi bi-book mr-1"></i>
                                                            <span>{{ $materi->nama_materi }}</span>
                                                        </div>
                                                        <hr color="black">
                                                    </li>

                                                @endif
                                            @endforeach
                                        </ul>
                                        <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                        <textarea id="deskripsi"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="deskripsi" readonly>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
