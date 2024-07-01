<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="width: max-content">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Status</th>
                <th>Saldo</th>
                <th>Nomor WA</th>
                <th>Cabang</th>
                <th>Alamat KTP</th>
                <th>Alamat Tinggal</th>
                <th>Foto KTP</th>
                <th>Foto Muka</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kurirs as $kurir)
                <tr>
                    <td>{{$kurir->full_name}}</td>
                    @if ($kurir->is_active)
                        <td>AKTIF</td>
                    @else
                        <td>NON-AKTIF</td>
                    @endif
                    <td>Rp. {{number_format($kurir->saldo, 0, ',', '.')}}</td>
                    <td>{{$kurir->wa_number}}</td>
                    <td>{{$kurir->cabang->name}}</td>
                    <td>{{$kurir->address_ktp}}</td>
                    <td>{{$kurir->address_now}}</td>
                    <td>
                        <a href="{{asset('storage/kurir') . '/'. $kurir->ktp_img}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/kurir') . '/'. $kurir->ktp_img}}" alt="Foto KTP" width="80px">
                        </a>
                    </td>
                    <td>
                        <a href="{{asset('storage/kurir') . '/'. $kurir->profile_img}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/kurir') . '/'. $kurir->profile_img}}" alt="Foto Muka" width="80px">
                        </a>
                    </td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$kurir->id}})"/>
                        <x-adminlte-button class="btn-sm" theme="danger" icon="fas fa-trash-alt"
                        wire:click="delete({{$kurir->id}}, '{{$kurir->full_name}}')"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

