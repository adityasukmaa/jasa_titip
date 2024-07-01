@extends('adminlte::page')

@section('title', 'Iklan | SobatKurir')

@section('content_header')
    @livewire('ads.update')
    @livewire('ads.delete')
    @livewire('alert.simple-alert')
    <h1>Iklan</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('ads.create')
                <x-adminlte-card title="Daftar Iklan" theme="success" icon="fas fa-route">
                    @livewire('ads.table')
                </x-adminlte-card>
            </div>
        </div>

    </div>
@stop

@section('css')
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
@stop

@section('js')
    @livewireScripts
@stop