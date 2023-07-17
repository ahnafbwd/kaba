@extends('admin.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Edit Waktu</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/dashboard/waktu" class="text-white">Waktu</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="/admin/dashboard/waktu" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-100"></i> Kembali</a>
                <form action="/admin/dashboard/waktu/{{ $waktu->kode_waktu }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#basicModal{{ $waktu->kode_waktu }}"><i
                            class="fas fa-trash fa-sm text-white-100 pr-2"></i>Hapus Waktu</button>
                    <div class="modal fade" id="basicModal{{ $waktu->kode_waktu }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Kamu yakin menghapus waktu tersebut?
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
                                        {{ __('Data Waktu') }}
                                    </h2>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/admin/dashboard/waktu/{{ $waktu->kode_waktu }}">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <!-- Nama Waktu -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="nama_waktu" :value="__('Nama Waktu')" />
                                            <x-text-input id="nama_waktu" class="block mt-1 w-full" type="text"
                                                name="nama_waktu" :value="old('nama_waktu', $waktu->nama_waktu)" required autofocus />
                                            <x-input-error :messages="$errors->get('nama_waktu')" class="mt-2" />
                                        </div>

                                        <!-- Durasi dalam Menit -->
                                        <div class="col-lg-6 mt-2">
                                            <x-input-label for="durasiInput" :value="__('Durasi (Menit)')" />
                                            <x-text-input id="durasiInput" class="block mt-1 w-full" type="text"
                                                name="durasi" :value="old('durasi', $waktu->durasi)" readonly />
                                            <x-input-error :messages="$errors->get('durasi')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Waktu Mulai -->
                                        <div class="col-lg-6 mt-2">
                                            <label for="waktu_mulai" class="block font-medium text-sm text-gray-700">Waktu Mulai</label>
                                            <x-time-picker-input id="waktu_mulai" class="block mt-1 w-full" type="time" name="waktu_mulai"
                                                :value="old('waktu_mulai', $waktu->waktu_mulai)" required autofocus />
                                            @error('waktu_mulai')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Waktu Berakhir -->
                                        <div class="col-lg-6 mt-2">
                                            <label for="waktu_berakhir" class="block font-medium text-sm text-gray-700">Waktu Berakhir</label>
                                            <x-time-picker-input id="waktu_berakhir" class="block mt-1 w-full" type="time" name="waktu_berakhir"
                                                :value="old('waktu_berakhir', $waktu->waktu_berakhir)" required />
                                            @error('waktu_berakhir')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
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
    <script>
        // Tangkap elemen input waktu
        const waktuMulaiInput = document.getElementById('waktu_mulai');
        const waktuBerakhirInput = document.getElementById('waktu_berakhir');
        const durasiInputEl = document.getElementById('durasiInput');

        // Tambahkan event listener saat nilai input waktu berubah
        waktuMulaiInput.addEventListener('input', hitungDurasi);
        waktuBerakhirInput.addEventListener('input', hitungDurasi);

        // Fungsi untuk menghitung durasi dan memperbarui nilai input durasi
        function hitungDurasi() {
            const waktuMulai = waktuMulaiInput.value;
            const waktuBerakhir = waktuBerakhirInput.value;

            // Pastikan kedua input waktu terisi
            if (waktuMulai && waktuBerakhir) {
                const [mulaiJam, mulaiMenit] = waktuMulai.split(':');
                const [berakhirJam, berakhirMenit] = waktuBerakhir.split(':');

                // Hitung selisih waktu dalam menit
                const durasiMenit = (berakhirJam * 60 + parseInt(berakhirMenit)) - (mulaiJam * 60 + parseInt(mulaiMenit));
                durasiInputEl.value = durasiMenit.toString();
            } else {
                durasiInputEl.value = '';
            }
        }
    </script>
@endsection
