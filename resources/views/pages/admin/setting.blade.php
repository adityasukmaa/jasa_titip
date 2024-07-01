@extends('adminlte::page')

@section('title', 'Setting | SobatKurir')

@section('content_header')
    @livewire('setting.update')
    {{-- @livewire('toko.delete') --}}
    @livewire('alert.simple-alert')
    <h1>Setting</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- @livewire('toko.create') --}}
                <x-adminlte-card title="Daftar Setting" theme="success" icon="fas fa-cogs">
                    @livewire('setting.table')
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