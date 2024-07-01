@extends('pages.customer.layout.index')
@section('title', 'Hasil Pencarian')
@section('css')
    <link href={{asset('vendor/themplate/css/home.css')}} rel="stylesheet">
@endsection
@section('content')

@include('pages.customer.layout.header')
<main>
    <div class="page_header" style="margin-top: 80px"> 
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                        <form method="get" action="{{route('front.searchRes')}}">
                            <input name='cari' type="text" class="form-control" placeholder="Seblak, Basreng, Bakso, dll">
                            <button type="submit"><i class="icon_search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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