@extends('user.dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Yah, Kelas Anda saat ini kosong atau Anda belum mendaftar program apapun</h3>
                    <h3 class="font-weight-bold mt-2"> {{ Auth::guard('web')->user()->nama_lengkap }} Yuk Daftar Program Dulu.</h3>
                    <h6 class="font-weight-normal mt-2 mb-0">Bahasa Arab itu mudah dipelajari! Yuk belajar sekarang!<a href="/user/dashboard"><span class="text-primary">Daftar disini</span></a></h6>
                </div>
            </div>
        </div>
    </div>
@endsection
