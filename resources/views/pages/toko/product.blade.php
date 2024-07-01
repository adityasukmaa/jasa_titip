@extends('adminlte::page')

@section('title', 'Produk | SobatKurir')

@section('content_header')
    @livewire('product.update')
    @livewire('product.delete')
    @livewire('alert.simple-alert')
    <h1>Produk Toko: <strong>{{$toko->name}}</strong> </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('product.create', ['toko_id' => $toko->id])
                <x-adminlte-card title="Daftar Produk" theme="success" icon="fas fa-route">
                    @livewire('product.table', ['toko_id' => $toko->id, 'products' => $toko->products()->orderBy('id', 'DESC')->get()])
                </x-adminlte-card>
            </div>
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