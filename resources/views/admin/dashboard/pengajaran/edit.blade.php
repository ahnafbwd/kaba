@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Edit Pengajaran</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/pengajaran" class="text-white">Pengajaran</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/dashboard/pengajaran" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                <form action="/admin/dashboard/pengajaran/{{ $pengajaran->kode_pengajaran }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#basicModal{{ $pengajaran->kode_pengajaran }}"><i
                            class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Pengajarana</button>
                    <div class="modal fade" id="basicModal{{ $pengajaran->kode_pengajaran }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Kamu yakin menghapus akun pengajaran tersebut?
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
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/pengajaran/{{ $pengajaran->kode_pengajaran }}">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <!-- Kode Materi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_materi" :value="__('Materi')" />
                                            <select id="kode_materi" name="kode_materi" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($materis as $materi)
                                                    <option value="{{ $materi->kode_materi }}" {{ $pengajaran->kode_materi === $materi->kode_materi ? 'selected' : '' }}>{{ $materi->nama_materi }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                        </div>
                                        <!-- Kode Pengajar -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_pengajar" :value="__('Pengajar')" />
                                            <select id="kode_pengajar" name="kode_pengajar" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($pengajars as $pengajar)
                                                    <option value="{{ $pengajar->kode_pengajar }}" {{ $pengajaran->kode_pengajar === $pengajar->kode_pengajar ? 'selected' : '' }}>{{ $pengajar->nama_lengkap }}</option>
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
                                                <option value="Senin" {{ $pengajaran->hari === 'Senin' ? 'selected' : '' }}>Senin</option>
                                                <option value="Selasa" {{ $pengajaran->hari === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                                <option value="Rabu" {{ $pengajaran->hari === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                                <option value="Kamis" {{ $pengajaran->hari === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                                <option value="Jumat" {{ $pengajaran->hari === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                                <option value="Sabtu" {{ $pengajaran->hari === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                                <option value="Minggu" {{ $pengajaran->hari === 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                                        </div>
                                        <!-- Kode Waktu -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_waktu" :value="__('Waktu')" />
                                            <select id="kode_waktu" name="kode_waktu" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($waktus as $waktu)
                                                    <option value="{{ $waktu->kode_waktu }}" {{ $pengajaran->kode_waktu === $waktu->kode_waktu ? 'selected' : '' }}>{{ $waktu->nama_waktu }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_waktu')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Status Pengajaran -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="status_pengajaran" :value="__('Status Pengajaran')" />
                                            <select id="status_pengajaran" name="status_pengajaran" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Aktif" {{ $pengajaran->status_pengajaran == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Tidak Aktif" {{ $pengajaran->status_pengajaran == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status_pengajaran')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center mt-4">
                                        <x-primary-button class="ml-4 bg-info">
                                            {{ __('Simpan') }}
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
