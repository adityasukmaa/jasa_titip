@extends('adminlte::page')

@section('title', 'Cek Saldo  | SobatKurir')

@section('content_header')
    @livewire('alert.simple-alert')
    <h1>{{$kurir->full_name}} {{$kurir->is_active ? '(Aktif)' : '(Non-Aktif)'}}</h1>
@stop

@section('content')
    <div>
        <x-adminlte-info-box title="Rp. {{number_format($kurir->saldo, 0, ',', '.')}}" text="Saldo" icon="fas fa-lg fa-money-bill text-primary" theme="gradient-primary" icon-theme="white"/>
        <x-adminlte-info-box title="Rp. {{number_format($kurir->orders()->sum('courir_fee'), 0, ',', '.')}}" text="Pendapatan Total" icon="fas fa-lg fa-dollar-sign text-dark" icon-theme="dark" theme="warning" icon-theme="white"/>
        @if ($kurir->is_active)
            <a href="{{route('courir.toggleStatus')}}">
                <x-adminlte-button  label="Non-Aktifkan Akun" theme="info" class="btn-block" icon="fas fa-power-off"/>
            </a>
        @else
            <a href="{{route('courir.toggleStatus')}}">
                <x-adminlte-button  label="Aktifkan Akun" theme="success" class="btn-block" icon="fas fa-power-off"/>
            </a>
        @endif
        

        <div >
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