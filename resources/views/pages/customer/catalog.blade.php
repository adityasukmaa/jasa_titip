@extends('pages.customer.layout.index')
@section('title', 'Home')

@section('css')
    <link href={{asset('vendor/themplate/css/detail-page.css')}} rel="stylesheet">
@endsection

@section('content')
@include('pages.customer.layout.header')

<main style="overflow: hidden">
    @include('pages.customer.layout.catalog-hero')
    @include('pages.customer.layout.catalog-item')
    @include('pages.customer.layout.footer')
</main>

{{-- @include('pages.customer.layout.catalog-modal') --}}
@livewire('catalog.modal')
@endsection

@section('js')
    @livewireScripts
    <script src={{asset('vendor/themplate/js/specific_detail.js')}}></script>
    <script>
        function toggle(){
            const modal = document.getElementById('modal-dialog');
            modal.classList.remove('display-none');
        }
    </script>
@endsection

@section('css')
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
@stop