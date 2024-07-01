<div>
    {{-- <span>Saldo: {{$saldo}}</span> --}}
    <x-adminlte-info-box title="Saldo" text="{{number_format($saldo, 0, ',', '.')}}" icon="fas fa-lg fa-dollar-sign" icon-theme="info"/>

    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor WA</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kurirs as $kurir)
                <tr>
                    <td>{{$kurir->full_name}}</td>
                    <td>{{$kurir->wa_number}}</td>
                    <td>{{number_format($kurir->saldo, 0, ',', '.')}}</td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-money-bill"
                        wire:click="topup({{$kurir->id}})"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

