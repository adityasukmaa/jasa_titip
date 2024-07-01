@extends('adminlte::page')

@section('title', 'Dashboard | SobatKurir')

@section('content_header')
    @if (Session::has('success'))
        <x-adminlte-alert class="" theme="info" title="Info" dismissable>
            Selamat datang {{ Auth::user()->full_name }}
        </x-adminlte-alert>
    @endif
    <h1>Dashboard</h1>
@stop

@section('content')
    @if (auth()->user()->role == 'superadmin')
        <div class="row">
            <div class="col-lg-3 col-12">
                <x-adminlte-small-box title="{{$cabang}}" text="Cabang" icon="fas fa-route " theme="info" url="#" />
            </div>
            <div class="col-lg-3 col-12">
                <x-adminlte-small-box title="{{$kurir}}" text="Kurir" icon="fas fa-motorcycle" theme="success" url="#" />
            </div>
            <div class="col-lg-3 col-12">
                <x-adminlte-small-box title="{{$toko}}" text="Toko" icon="fas fa-store " theme="warning" url="#" />
            </div>   
            <div class="col-lg-3 col-12">
                <x-adminlte-small-box title="{{$produk}}" text="Produk" icon="fas fa-boxes" theme="danger" url="#" />
            </div> 
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <x-adminlte-info-box title="Rp {{number_format( $topup, 0, ',', '.')}}" text="Pendapatan Topup Bulan Ini" icon="fas fa-lg fa-dollar-sign text-primary" theme="gradient-primary" icon-theme="white"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-12">
            <x-adminlte-info-box title="Rp {{number_format( $transaksi, 0, ',', '.')}}" text="Transaksi" icon="fas fa-lg fa-money-bill-alt text-primary" theme="gradient-primary" icon-theme="white"/>
        </div>
        <div class="col-lg-3 col-12">
            <x-adminlte-info-box title="Rp {{number_format( $courir_fee, 0, ',', '.')}}" text="Pendapatan Kurir" icon="fas fa-lg fa-motorcycle text-primary" theme="gradient-primary" icon-theme="white"/>
        </div>
        <div class="col-lg-3 col-12">
            <x-adminlte-info-box title="Rp {{number_format( $app_fee, 0, ',', '.')}}" text="Pendapatan Admin" icon="fas fa-lg fa-users text-primary" theme="gradient-primary" icon-theme="white"/>
        </div>   
        <div class="col-lg-3 col-12">
            <x-adminlte-info-box title="{{$order}}" text="Order" icon="fas fa-lg fa-receipt text-primary" theme="gradient-primary" icon-theme="white"/>
        </div> 
    </div>
    
@stop

{{-- @section('plugins.TempusDominusBs4', true) --}}
{{-- @section('plugins.DateRangePicker', true) --}}
@section('css')
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
@stop

@section('js')
    @livewireScripts
@stop