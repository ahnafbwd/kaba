@extends('pengajar.dashboard.layouts.main')

@section('container')
    <div>
        <div class="pagetitle">
            <h1 class="mb-2">Tambah Absensi</h1>
            <nav class="">
                <ol class="breadcrumb border border-gray bg-dark">
                    <li class="breadcrumb-item"><a href="/pengajar/dashboard" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pengajar/absensi" class="text-white">Absensi</a></li>
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
                                        {{ __('Data Jadwal') }}
                                    </h2>
                                    <p class="font-semibold text-gray-800 text-center">Masukkan data
                                        absensi</p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <form method="post" action="/pengajar/absensi/">
                                    @csrf
                                    <div class="col">
                                        <!-- Kode Jadwal -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="row-lg-6 mt-2">
                                                    <x-input-label for="kode_jadwal" :value="__('Jadwal')" />
                                                    <select id="kode_jadwal" name="kode_jadwal"
                                                        class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        @foreach ($jadwals as $jadwal)
                                                            <option value="{{ $jadwal->kode_jadwal }}">
                                                                {{ $jadwal->kelompok->nama_kelas }} - {{ $jadwal->pengajaran->materi->nama_materi }} - {{ $jadwal->pengajaran->hari }} - {{ $jadwal->pengajaran->waktu->nama_waktu }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('kode_jadwal')" class="mt-2" />
                                                </div>
                                                <!-- Tanggal Absensi -->
                                                <div class="row-lg-6 mt-2">
                                                    <x-input-label for="tanggal_absensi" :value="__('Tanggal Absensi')" />
                                                    <x-date-input id="tanggal_absensi" class="block mt-1 w-full" type="date"
                                                        name="tanggal_absensi" :value="old('tanggal_absensi')" required autocomplete="off" />
                                                    <x-input-error :messages="$errors->get('tanggal_absensi')" class="mt-2" />
                                                </div>
                                                <!-- Durasi dalam Menit -->
                                                <div class="row-lg-6 mt-2">
                                                    <x-input-label for="durasiInput" :value="__('Durasi (Menit)')" />
                                                    <x-text-input id="durasiInput" class="block mt-1 w-full" type="text"
                                                        name="durasi" :value="old('durasi')" readonly />
                                                    <x-input-error :messages="$errors->get('durasi')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <!-- Waktu Mulai -->
                                                <div class="row-lg-6 mt-2">
                                                    <label for="waktu_mulai" class="block font-medium text-sm text-gray-700">Waktu Mulai</label>
                                                    <x-time-picker-input id="waktu_mulai" class="block mt-1 w-full" type="time" name="waktu_mulai"
                                                        :value="old('waktu_mulai')" required autofocus />
                                                    @error('waktu_mulai')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Waktu Berakhir -->
                                                <div class="row-lg-6 mt-2">
                                                    <label for="waktu_berakhir" class="block font-medium text-sm text-gray-700">Waktu Berakhir</label>
                                                    <x-time-picker-input id="waktu_berakhir" class="block mt-1 w-full" type="time" name="waktu_berakhir"
                                                        :value="old('waktu_berakhir')" required />
                                                    @error('waktu_berakhir')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <!-- Keterangan -->
                                                <div class="row-lg-6 mt-2">
                                                    <x-input-label for="keterangan" :value="__('Keterangan')" />
                                                    <textarea id="keterangan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="keterangan">{{ old('keterangan') }}</textarea>
                                                    <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                                </div>
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
