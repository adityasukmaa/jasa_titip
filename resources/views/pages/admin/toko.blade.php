@extends('adminlte::page')

@section('title', 'Toko | SobatKurir')

@section('content_header')
    @livewire('toko.update')
    @livewire('toko.delete')
    @livewire('alert.simple-alert')
    <h1>Toko</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('toko.create')
                <x-adminlte-card title="Daftar Toko" theme="success" icon="fas fa-route">
                    @livewire('toko.table')
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