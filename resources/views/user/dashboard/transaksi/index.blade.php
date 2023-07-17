@extends('user.dashboard.layouts.main')

@section('container')
     <!-- Page Heading -->
     <div class="pagetitle">
        <nav>
            <ol class="breadcrumb border border-gray bg-dark">
                <li class="breadcrumb-item"><a href="/user/dashboard" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white">Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (session()->has('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header bg-dark py-3" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <div class="d-sm-flex align-items-center justify-content-between mt-2 mb-2">
                    <h6 class="m-0 font-weight-bold text-white">Data Pendaftaran dan Transaksi</h6>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="10%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pendaftaran</th>
                            <th>Kelas</th>
                            <th>Status Pendaftaran</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pendaftaran->kode_pendaftaran }}</td>
                                <td>{{ $pendaftaran->kelompok->nama_kelas }}</td>
                                <td class="text-center">
                                @if ($pendaftaran->status_pendaftaran === 'Belum Bayar')
                                    <label class="badge badge-danger">{{ $pendaftaran->status_pendaftaran }}</label>
                                @elseif ($pendaftaran->status_pendaftaran === 'Diproses')
                                    <label class="badge badge-warning">{{ $pendaftaran->status_pendaftaran }}</label>
                                @elseif ($pendaftaran->status_pendaftaran === 'Berhasil')
                                    <label class="h6 font-weight-bold badge badge-success">{{ $pendaftaran->status_pendaftaran }}</label>
                                @elseif ($pendaftaran->status_pendaftaran === 'Gagal')
                                    <label class="badge badge-danger">{{ $pendaftaran->status_pendaftaran }}</label>
                                @endif
                                </td>
                                <td>{{ $pendaftaran->tanggal_pendaftaran }}</td>
                                <td class="text-center">
                                    <a href="/user/pendaftaran/{{ $pendaftaran->kode_pendaftaran }}" class="btn btn-info btn-circle btn-sm h5 font-weight-normal ">Lihat Detail</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
