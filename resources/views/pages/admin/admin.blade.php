@extends('adminlte::page')

@section('title', 'Admin | SobatKurir')

@section('content_header')
    @livewire('admin.update')
    @livewire('admin.delete')
    @livewire('alert.simple-alert')
    <h1>Admin</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('admin.create')
                <x-adminlte-card title="Daftar Admin" theme="success" icon="fas fa-user">
                    @livewire('admin.table')
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