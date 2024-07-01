@extends('pages.customer.layout.index')
@section('title', 'Cabang')
@section('css')
    <link href={{asset('vendor/themplate/css/home.css')}} rel="stylesheet">
@endsection
@section('content')

@include('pages.customer.layout.header')
<main style="padding-top: 30px">
    @include('pages.customer.layout.search-item', ['products' => $products])
    @include('pages.customer.layout.ads')
    @include('pages.customer.layout.cabang')
    @include('pages.customer.layout.footer')
</main>

@endsection


@section('js')
    @livewireScripts
@endsection

@section('css')
    @livewireStyles
@stop