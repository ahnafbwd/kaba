@extends('pengajar.dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <h5 class="card-title text-white">Kelas</h5>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($kelompoks->count() > 0)
            @foreach ($kelompoks as $kelompok)
                <div class="col-md-4 mb-3">
                    <a href="/pengajar/kelas/{{ $kelompok->kode_kelas }}" class="btn btn-fw bg-white shadow-md w-100 mb-2">
                        <div class="card-body ">
                            <div class="mb-4">
                                <h2 class="h4 font-weight-bold">{{ $kelompok->nama_kelas }}</h2>
                                <h4 class="font-weight-normal">{{ Str::limit($kelompok->deskripsi, 50 , '...') }}</h4>
                            </div>
                            <hr>
                            <div class="mt-2">
                                <h5 class="font-weight-bold">Lihat Detail</h5>
                                <i class="icon-arrow-right h5 font-weight-300 mr-2"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ $kelompok->link_wa }}" class="btn btn-fw bg-green w-full btn-success mr-2" style=" margin-right: 8px; scroll-snap-align: center;"><p class="text-white font-weight-bold"><i class="fab fa-whatsapp mr-2"></i>Link Grup Whatsapp</p></a>
                </div>
                @if ($loop->iteration % 3 === 0)
                    </div><div class="row">
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection
