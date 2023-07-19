@extends('user.dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="col card bg-primary">
                    <div class="card-body">
                        <p class="card-title text-white mb-0">Absensi</p>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                @if ($absensisaatini)
                <a href="/user/absensi/{{ $absensisaatini->kode_absensi }}" class="row btn p-0 shadow-sm bg-white w-full btn-white ml-1 ">
                <div class="col card bg-white shadow-sm ">
                    <div class=" card-body">
                        <div class="row">
                            <p class="card-title h3 font-weight-400 text-primary pb-0 mb-2">Absensi saat ini</p>
                        </div>
                        <div class="row">
                            <p class="h5 text-gray pt-0 mt-0">{{ $absensisaatini->jadwal->pengajaran->materi->nama_materi }}</p>
                        </div>
                    </div>
                </div>
                </a>
                @else
                    <div class="card bg-white shadow-sm mb-3">
                        <div class="card-body">
                            <p class="card-title h3 font-weight-400 text-primary pb-0 mb-2 mt-1">Tidak ada absensi saat ini</p>
                            <p class="h5 text-gray pt-0 mt-0">Silahkan hubungi admin untuk informasi lebih lanjut</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card bg-primary">
                    <div class="card-body ">
                        <h5 class="card-title text-white">Riwayat Absensi</h5>
                        <a href="#" class="btn btn-fw shadow-sm bg-white w-full btn-white mr-2"
                            style=" margin-right: 8px; scroll-snap-align: center;">
                            <p class="text-primary font-weight-bold text-center">
                                Lihat Riwayat Absensi
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <!-- DataTales Example -->
        <div class="card shadow-md mb-4">
            <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Tabel Absensi</h6>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kelas - Materi</th>
                                <th>Hari - Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensis as $absensi)
                                @foreach ($absensi->jadwal as $jadwal)
                                    <tr>
                                        <td>{{ $jadwal->kelompok->nama_kelas }} - {{ $jadwal->pengajaran->materi->nama_materi }}</td>
                                        <td>{{ $jadwal->pengajaran->hari }}, {{ $absensi->tanggal_absensi }}</td>
                                        <td>{{ $absensi->waktu_mulai }} - {{ $absensi->waktu_berakhir }}</td>
                                        <td>{{ $absensi->status_kehadiran_pengajar }}</td>
                                        <td>{{ Str::limit($absensi->keterangan, 30, '...') }}</td>
                                        <td><a href="{{ "/user/absensi/" . $absensi->kode_absensi }}" class="btn-sm btn-info text white">Lihat Detail</a></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

        </div>
    @endsection
