@extends('adminlte::page')

@section('title', 'Kurir | SobatKurir')

@section('content_header')
    @livewire('kurir.update')
    @livewire('kurir.delete')
    @livewire('alert.simple-alert')
    <h1>Kurir</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('kurir.create')
                <x-adminlte-card title="Daftar Kurir" theme="success" icon="fas fa-route">
                    @livewire('kurir.table')
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