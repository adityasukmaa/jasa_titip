@extends('pages.customer.layout.index')
@section('title', 'Order')

@section('css')
    <link href={{asset('vendor/themplate/css/order-sign_up.css')}} rel="stylesheet">
    <link href={{asset('vendor/themplate/css/detail-page.css')}} rel="stylesheet">
@endsection


@section('content')
    @include('pages.customer.layout.header')

    <main class="bg_gray" style="padding-top: 30px">
        @livewire('order.order')
        @include('pages.customer.layout.footer')
    </main>


@endsection

@section('js')
    @livewireScripts
     
@endsection

@section('css')
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
@stop