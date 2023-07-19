@extends('pengajar.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Detail Tugas</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pengajar/tugas" class="text-white">Tugas</a></li>
                    <li class="breadcrumb-item active text-white">Detail</li>
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
                                        {{ __('Data Tugas') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        tugas</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <!-- Nama Tugas -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="nama_tugas" :value="__('Nama Tugas')" />
                                        <x-text-input id="nama_tugas" class="block mt-1 w-full" type="text"
                                            name="nama_tugas" :value="old('nama_tugas', $tugas->nama_tugas)" readonly />
                                        <x-input-error :messages="$errors->get('nama_tugas')" class="mt-2" />
                                    </div>
                                    <!-- Kode Kelas -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="kode_kelas" :value="__('Kelas')" />
                                        <x-text-input id="kode_kelas" class="block mt-1 w-full" type="text"
                                            name="kode_kelas" :value="old('kode_kelas', $tugas->kelompok->nama_kelas)" readonly />
                                        <x-input-error :messages="$errors->get('kode_kelas')" class="mt-2" />
                                    </div>
                                    <!-- Kode Materi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="kode_materi" :value="__('Materi')" />
                                        <x-text-input id="kode_materi" class="block mt-1 w-full" type="text"
                                            name="kode_materi" :value="old('kode_materi', $tugas->materi->nama_materi)" readonly />
                                        <x-input-error :messages="$errors->get('kode_materi')" class="mt-2" />
                                    </div>
                                    <!-- Tanggal Pengumpulan -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="tanggal_pengumpulan" :value="__('Tanggal Pengumpulan')" />
                                        <x-text-input id="tanggal_pengumpulan" class="block mt-1 w-full" type="text"
                                            name="tanggal_pengumpulan" :value="old('kode_materi', $tugas->tanggal_pengumpulan)" readonly />
                                        <x-input-error :messages="$errors->get('tanggal_pengumpulan')" class="mt-2" />
                                    </div>
                                    <!-- Deskripsi -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                        <textarea id="deskripsi"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="deskripsi" readonly>{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                    </div>
                                    <!-- Keterangan -->
                                    <div class="col-lg-6 mt-2">
                                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                                        <textarea id="keterangan"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="keterangan" readonly>{{ old('keterangan', $tugas->keterangan) }}</textarea>
                                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Daftar Siswa yang Sudah Mengerjakan Tugas</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Siswa</th>
                            <th>Nama Siswa</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Nilai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumpulans as $pengumpulan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengumpulan->siswa->kode_siswa }}</td>
                                <td>{{ $pengumpulan->siswa->user->nama_lengkap }}</td>
                                <td>Sudah mengerjakan</td>
                                <td><a href="{{ route('pengajartugasdownload.download', $pengumpulan->kode_tugas) }}"
                                        class="btn btn-primary btn-sm" download>
                                        Download
                                    </a></td>
                                <td>
                                    @if ($pengumpulan)
                                    @if (!$pengumpulan->nilai)
                                            0
                                        @else
                                            {{ $pengumpulan->nilai }}
                                        @endif
                                    @else
                                        Data pengumpulan tidak ditemukan.
                                    @endif
                                </td>
                                <td>
                                    @if (!$pengumpulan->nilai)
                                            <!-- Button trigger modal for providing the grade -->
                                            <button type="button" class="btn btn-primary bg-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#gradeModal{{ $pengumpulan->kode_pengumpulan }}">
                                                Beri Nilai
                                            </button>
                                            <!-- Modal for providing the grade -->
                                            <div class="modal fade" id="gradeModal{{ $pengumpulan->kode_pengumpulan }}"
                                                tabindex="-1" aria-labelledby="gradeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="gradeModalLabel">Beri Nilai</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('pengajartugasnilai.nilai', ['kodetugas' => $tugas->kode_tugas, 'kodepengumpulan' => $pengumpulan->kode_pengumpulan]) }}" method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="nilai" class="form-label">Nilai</label>
                                                                    <input type="number" class="form-control" id="nilai" name="nilai" value="{{ old('nilai') }}">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Button trigger modal for providing the grade -->
                                            <button type="button" class="btn btn-primary bg-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#gradeModal{{ $pengumpulan->kode_pengumpulan }}">
                                                Edit Nilai
                                            </button>
                                            <!-- Modal for providing the grade -->
                                            <div class="modal fade" id="gradeModal{{ $pengumpulan->kode_pengumpulan }}"
                                                tabindex="-1" aria-labelledby="gradeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="gradeModalLabel">Masukkan Nilai</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('pengajartugasnilai.nilai', ['kodetugas' => $tugas->kode_tugas, 'kodepengumpulan' => $pengumpulan->kode_pengumpulan]) }}" method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="nilai" class="form-label">Nilai</label>
                                                                    <input type="number" class="form-control" id="nilai" name="nilai" value="{{ old('nilai') }}">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{ route('pengajarpengumpulanhapus.hapus', ['kodetugas' => $tugas->kode_tugas, 'kodepengumpulan' => $pengumpulan->kode_pengumpulan]) }}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger bg-danger btn-circle btn-sm ml-2" data-bs-toggle="modal" data-bs-target="#basicModal{{ $pengumpulan->kode_pengumpulan }}"><i class="fas fa-trash"></i></button>
                                            <div class="modal fade" id="basicModal{{ $pengumpulan->kode_pengumpulan }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title">Peringatan</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Kamu yakin menghapus pengumpulan tugas siswa ini?
                                                    </div>
                                                    <div class="modal-footer align-items-center justify-content-center">
                                                      <button type="button" class="btn btn-dark bg-dark border-1" data-bs-dismiss="modal">Kembali</button>
                                                      <button type="submit" class="btn btn-danger bg-danger">Hapus</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div><!-- End Basic Modal-->
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Daftar Siswa yang Belum Mengerjakan Tugas</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Siswa</th>
                            <th>Nama Siswa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswaBelumMengerjakan as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->kode_siswa }}</td>
                                <td>{{ $siswa->user->nama_lengkap }}</td>
                                <td>Belum mengerjakan</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add these scripts at the end of your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
