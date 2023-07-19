@extends('pengajar.dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card bg-primary">
                <div class="card-body">
                    {{-- <h5 class="card-title text-white">Materi</h5> --}}
                    <p class="card-title text-white mb-1">Materi</p>
                    <h3 class="h6 font-weight-800 text-secondary mt-1">Berikut materi yang Ustazd {{ Auth::guard('pengajar')->user()->nama_lengkap }} Ajarkan : </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($materis->count() > 0)
            @foreach ($materis as $materi)
                <div class="col-md-4 mb-3">
                    <a href="/pengajar/materi/{{ $materi->kode_materi }}" class="btn btn-fw bg-white shadow-md w-100 mb-2">
                        <div class="card-body ">
                            <div class="mb-4">
                                <h2 class="h4 font-weight-bold">{{ $materi->nama_materi }}</h2>
                                <h4 class="font-weight-normal">{{ Str::limit($materi->deskripsi, 50 , '...') }}</h4>
                            </div>
                            <hr>
                            <div class="mt-2">
                                <h5 class="font-weight-bold">Lihat Detail</h5>
                                <i class="icon-arrow-right h5 font-weight-300 mr-2"></i>
                            </div>
                        </div>
                    </a>
                </div>
                @if ($loop->iteration % 3 === 0)
                    </div><div class="row">
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection
