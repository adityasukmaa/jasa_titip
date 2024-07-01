@extends('adminlte::page')

@section('title', 'Ganti Password | SobatKurir')

@section('content_header')
    @livewire('alert.simple-alert')
    <h1>Ganti Password</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('auth.change-password')
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