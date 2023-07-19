@extends('user.dashboard.layouts.main')

@section('container')
<div>
    <div class="pagetitle">
        <h1 class="h3 card-title mb-2">Informasi Tugas</h1>
        <nav class="">
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="/user/tugas" class="text-white">Tugas</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <a href="/user/tugas" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h2 class="font-semibold text-xl text-white leading-tight text-center">
                    {{ __('Detail Tugas') }}
                </h2>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Tugas -->
                <div class="col-lg-6 mt-2 mb-2">
                    <x-input-label for="nama_tugas" :value="__('Tugas')" />
                    <x-text-input id="nama_tugas" class="block mt-1 w-full" type="text" name="nama_tugas"
                        :value="old('nama_tugas',  $tugas->nama_tugas )" readonly />
                    <x-input-error :messages="$errors->get('nama_tugas')" class="mt-2 mb-2" />
                </div>
                <!-- Materi -->
                <div class="col-lg-6 mt-2 mb-2">
                    <x-input-label for="nama_materi" :value="__('Materi')" />
                    <x-text-input id="nama_materi" class="block mt-1 w-full" type="text" name="nama_materi"
                        :value="old('nama_materi', $tugas->materi->nama_materi)" readonly />
                    <x-input-error :messages="$errors->get('nama_materi')" class="mt-2 mb-2" />
                </div>
                <!-- Tanggal Pengumpulan Terakhir -->
                <div class="col-lg-6 mt-2 mb-2">
                    <x-input-label for="tanggal_pengumpulan" :value="__('Tanggal Pengumpulan Terakhir')" />
                    <x-text-input id="tanggal_pengumpulan" class="block mt-1 w-full" type="text" name="tanggal_pengumpulan"
                        :value="old('tanggal_pengumpulan', $tugas->tanggal_pengumpulan)" readonly />
                    <x-input-error :messages="$errors->get('tanggal_pengumpulan')" class="mt-2 mb-2" />
                </div>
                <!-- Status Pengumpulan -->
                <div class="col-lg-6 mt-2 mb-2">
                    <x-input-label for="status_pengumpulan" :value="__('Status Pengumpulan')" />
                    <x-text-input id="status_pengumpulan" class="block mt-1 w-full" type="text" name="status_pengumpulan"
                    :value="old('status_pengumpulan', ($pengumpulan ? $pengumpulan->status_pengumpulan : 'Belum Dikumpulkan'))" readonly />
                    {{-- <p class="block mt-1 w-full">{{ $pengumpulan ? $pengumpulan->status_pengumpulan : 'Belum Dikumpulkan' }} </p> --}}
                    <x-input-error :messages="$errors->get('status_pengumpulan')" class="mt-2 mb-2" />
                </div>
                <!-- Deskripsi -->
                <div class="col-lg-6 mt-2">
                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                    <textarea id="deskripsi"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="deskripsi" readonly>{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                </div>
                <!-- Deskripsi -->
                <div class="col-lg-6 mt-2">
                    <x-input-label for="keterangan" :value="__('Keterangan')" />
                    <textarea id="keterangan"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="keterangan" readonly>{{ old('keterangan', $tugas->keterangan) }}</textarea>
                    <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                </div>
                    @if ($pengumpulan)
                    <div class="col-lg-6 mt-2 mb-2">
                        <x-input-label for="download" :value="__('File Pengumpulan:')" />
                        <a href="{{ route('tugasdownload.download', $pengumpulan->kode_tugas) }}" class="btn btn-primary btn-sm" download>
                            Download File
                        </a>
                        <x-input-error :messages="$errors->get('tanggal_pengumpulan')" class="mt-2 mb-2" />
                    </div>
                    @endif

                    @if (!$pengumpulan)
                    <div class="col-lg-6 mt-2 justify-center align-center">
                        <form action="/user/tugas/{{ $tugas->kode_tugas }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 mt-2 mb-4">
                                <x-input-label for="file_tugas" :value="__('Upload Tugas')" />
                                <input type="file" class="form-control-file block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="file_tugas" name="file_tugas" required>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary ml-2 bg-primary"data-bs-toggle="modal" data-bs-target="#basicModal">Unggah</button>
                            <div class="modal fade" id="basicModal" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Peringatan</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Kamu yakin mengupload tugas ini? Tugas yang telah di upload tidak dapat diubah
                                    </div>
                                    <div class="modal-footer align-items-center justify-content-center">
                                      <button type="button" class="btn btn-dark bg-dark border-1" data-bs-dismiss="modal">Kembali</button>
                                      <button type="submit" class="btn btn-danger bg-danger">Upload</button>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- End Basic Modal-->
                        </form>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
