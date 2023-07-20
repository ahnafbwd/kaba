@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Edit Program</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/program" class="text-white">Program</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/program" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
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

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <!-- Page Heading -->
                                <div class="items-center justify-center">
                                    <h2 class="font-semibold text-xl text-dark-800 leading-tight text-center">
                                        {{ __('Edit Program') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Edit data program</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="{{ route('admin.program.update', $program->kode_program) }}">
                                    @csrf
                                    @method('patch')

                                    <div class="row">
                                        <!-- Nama Program -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_program" :value="__('Nama Program')" />
                                            <x-text-input id="nama_program" class="block mt-1 w-full" type="text"
                                                name="nama_program" :value="old('nama_program', $program->nama_program)" required />
                                            <x-input-error :messages="$errors->get('nama_program')" class="mt-2" />
                                        </div>
                                        <!-- Kode Tingkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_tingkat" :value="__('Tingkat')" />
                                            <select id="kode_tingkat" name="kode_tingkat"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($tingkats as $tingkat)
                                                    <option value="{{ $tingkat->kode_tingkat }}"
                                                        {{ old('kode_tingkat', $program->kode_tingkat) == $tingkat->kode_tingkat ? 'selected' : '' }}>
                                                        {{ $tingkat->nama_tingkat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_tingkat')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Deskripsi Singkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                            <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text"
                                                name="deskripsi_singkat" :value="old('deskripsi_singkat', $program->deskripsi_singkat)" required />
                                            <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2" />
                                        </div>
                                        <!-- Kode Jadwal -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_jadwal" :value="__('Kode Jadwal')" />
                                            <select id="kode_jadwal" name="kode_jadwal"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($jadwals as $jadwal)
                                                    <option value="{{ $jadwal->kode_jadwal }}"
                                                        {{ old('kode_jadwal', $program->kode_jadwal) == $jadwal->kode_jadwal ? 'selected' : '' }}>
                                                        {{ $jadwal->kode_jadwal }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kode_jadwal')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Harga -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="harga" :value="__('Harga')" />
                                            <x-text-input id="harga" class="block mt-1 w-full" type="number"
                                                name="harga" :value="old('harga', $program->harga)" required />
                                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                                        </div>
                                        <!-- Status Program -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="status_program" :value="__('Status Program')" />
                                            <select id="status_program" name="status_program"
                                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Aktif"
                                                    {{ $program->status_program === 'Aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="Tidak Aktif"
                                                    {{ $program->status_program === 'Tidak Aktif' ? 'selected' : '' }}>
                                                    Tidak Aktif
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status_program')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Materi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kode_materi" :value="__('Materi')" />
                                            <ul id="kode_materi" name="kode_materi[]" class="list-group block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($materis as $materi)
                                                    <li class="list-group-item border-0">
                                                        <input class="form-check-input" type="checkbox" name="kode_materi[]" value="{{ $materi->kode_materi }}" {{ in_array($materi->kode_materi, $selectedMateris) ? 'checked' : '' }}>
                                                        {{ $materi->nama_materi }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                        </div>
                                        <!-- Deskripsi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                            <textarea id="deskripsi"
                                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="deskripsi" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                        </div>
                                        <!-- Kuota Siswa -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="kuota_siswa" :value="__('Kuota Siswa')" />
                                            <x-text-input id="kuota_siswa" class="block mt-1 w-full" type="number"
                                                name="kuota_siswa" :value="old('kuota_siswa', $program->kuota_siswa)" required />
                                            <x-input-error :messages="$errors->get('kuota_siswa')" class="mt-2" />
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
