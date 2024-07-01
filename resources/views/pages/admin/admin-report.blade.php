@extends('adminlte::page')

@section('title', 'Laporan Admin | SobatKurir')

@section('content_header')
    @livewire('alert.simple-alert')
    <h1>Laporan Admin</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-adminlte-card title="Laporan Admin" theme="success" icon="fas fa-user">
                    @livewire('admin-report.table')
                </x-adminlte-card>
            </div>
        </div>

    </div>
@stop
@section('plugins.TempusDominusBs4', true)
@section('plugins.DateRangePicker', true)
@section('css')
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
@stop
@section('js')
    @livewireScripts
@stop