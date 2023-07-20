@extends('homepage.layouts.main')

@section('container')

@include('homepage.homecontent.heroutama')
@include('homepage.homecontent.jumlah')
@include('homepage.homecontent.why')
{{-- @include('homepage.homecontent.kategori') --}}
{{-- @include('homepage.homecontent.program') --}}
@include('homepage.homecontent.cta')
@include('homepage.homecontent.testi')
{{-- @include('homepage.homecontent.team') --}}

@endsection
