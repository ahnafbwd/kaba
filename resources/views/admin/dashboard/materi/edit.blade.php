@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Edit Materi</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/materi" class="text-white">Materi</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/materi" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                <form action="/admin/materi/{{ $materi->kode_materi }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm bg-danger"
                        data-bs-toggle="modal" data-bs-target="#basicModal{{ $materi->kode_materi }}"><i
                            class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Materi</button>
                    <div class="modal fade" id="basicModal{{ $materi->kode_materi }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Kamu yakin menghapus materi tersebut?
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
                                        {{ __('Data Materi') }}
                                    </h2>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/materi/{{ $materi->kode_materi }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <!-- Nama Materi -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_materi" :value="__('Nama Materi')" />
                                            <x-text-input id="nama_materi" class="block mt-1 w-full" type="text"
                                                name="nama_materi" :value="old('nama_materi', $materi->nama_materi)" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_materi')" class="mt-2" />
                                        </div>

                                        <!-- Deskripsi Singkat -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
                                            <x-text-input id="deskripsi_singkat" class="block mt-1 w-full" type="text"
                                                name="deskripsi_singkat" :value="old('deskripsi_singkat', $materi->deskripsi_singkat)" required autocomplete="deskripsi_singkat" />
                                            <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Deskripsi -->
                                        <div class="col-lg-6 mt-4">
                                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                            <textarea id="deskripsi"
                                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="deskripsi" required>{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                        </div>
                                        <!-- Modul -->
                                        <div class="col-lg-6 mt-2">
                                            <div class="row-lg-6 mt-2">
                                                <x-input-label for="modul" :value="__('Modul')" />
                                                  <div class="input-group block mt-1 w-full mb-3">
                                                    <input type="file" class="form-control " id="modul" placeholder="Upload Modul" name="modul" required>
                                                    <label class="input-group-text bg-dark text-white " for="modul">Upload</label>
                                                  </div>
                                                <x-input-error :messages="$errors->get('modul')" class="mt-2" />
                                            </div>
                                            <div class="row-lg-6 mt-2">
                                                <div class="input-group">
                                                    <p class="mt-1 mr-2">Modul saat ini: </p>
                                                    <input type="text" class="form-control" disabled value="{{ $materi->modul ?? 'Tidak ada modul yang diunggah' }}">
                                                    @if ($materi->modul)
                                                        <a href="{{ route('materi.download', $materi->kode_materi) }}" class="btn btn-primary mb-2" download>Download</a>
                                                    @endif
                                                </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="modul">Modul</label>
                                            <input id="modul" type="file" name="modul">
                                            @if ($materi->modul)
                                                <p>Modul saat ini: <a href="{{ asset('materi/' . $materi->modul) }}" target="_blank">{{ $materi->modul }}</a></p>
                                            @else
                                                <p>Tidak ada modul yang diunggah.</p>
                                            @endif
                                        </div> --}}
                                        {{-- <!-- Modul -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="modul" :value="__('Modul')" />
                                            <input id="modul" class="block mt-1 w-full" type="file" name="modul" :value="old('modul', $materi->modul)" required autofocus />
                                            <x-input-error :messages="$errors->get('modul')" class="mt-2" />
                                        </div> --}}
                                        {{-- <!-- Modul -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="modul" :value="__('Modul')" />
                                            <x-text-input id="modul" class="block mt-1 w-full" type="text"
                                                name="modul" :value="old('modul', $materi->modul)" required autocomplete="modul" />
                                            <x-input-error :messages="$errors->get('modul')" class="mt-2" />
                                        </div> --}}
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
