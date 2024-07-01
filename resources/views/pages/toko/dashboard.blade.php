@extends('adminlte::page')

@section('title', 'Dashboard Toko  | SobatKurir')

@section('content_header')
    @livewire('alert.simple-alert')
    <h1>{{$toko->name}} {{$toko->is_open ? '(Buka)' : '(Tutup)'}}</h1>
@stop

@section('content')
    <div>
        <x-adminlte-info-box title="{{$toko->products->count()}}" text="Produk" icon="fas fa-lg fa-boxes text-primary" theme="gradient-primary" icon-theme="white"/>
        @if ($toko->is_open)
            <a href="{{route('toko.toggleStatus')}}">
                <x-adminlte-button  label="Tutup Toko" theme="info" class="btn-block" icon="fas fa-power-off"/>
            </a>
        @else
            <a href="{{route('toko.toggleStatus')}}">
                <x-adminlte-button  label="Buka Toko" theme="success" class="btn-block" icon="fas fa-power-off"/>
            </a>
        @endif
        

        {{-- <div >
            <div class="table-responsive">
            <table class="table table-bordered" style="min-width: max-content">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Kurir FEE</th>
                        <th>Total Belanja</th>
                        <th>Jasa Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kurir->orders()->latest()->get() as $order)
                        <tr>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d/m/Y H:i')}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->courir_fee}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->app_fee}}</td>

                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        
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