@extends('pages.customer.layout.index')
@section('title', 'SobatKurir | Pesan Makanan Dengan Mudah')

@section('css')
    <link href={{asset('vendor/themplate/css/home.css')}} rel="stylesheet">
@endsection

@section('content')
    @include('pages.customer.layout.header')

    <main>
        @include('pages.customer.layout.hero')
        {{-- @include('pages.customer.layout.services') --}}
        @include('pages.customer.layout.ads')
        @include('pages.customer.layout.cabang')
        {{-- @include('pages.customer.layout.cta') --}}
        {{-- @include('pages.customer.layout.footer') --}}
    </main>
    
@endsection