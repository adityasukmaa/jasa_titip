<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor WA</th>
                <th>Cabang</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->full_name}}</td>
                    <td>{{$admin->wa_number}}</td>
                    <td>{{$admin->cabang->name}}</td>
                    <td>{{number_format($admin->saldo, 0, ',', '.')}}</td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-money-bill"
                        wire:click="topup({{$admin->id}})"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

