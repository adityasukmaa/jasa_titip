@extends('adminlte::page')

@section('title', 'TopUp | SobatKurir')

@section('content_header')
    @livewire('topup-kurir.modal')
    @livewire('alert.simple-alert')
    <h1>Topup</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-adminlte-card title="Daftar Admin" theme="success" icon="fas fa-users">
                    @livewire('topup-kurir.kurir-table')
                </x-adminlte-card>
                <x-adminlte-card title="History Toupup" theme="dark" icon="fas fa-history">
                    @livewire('topup-kurir.history-table')
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