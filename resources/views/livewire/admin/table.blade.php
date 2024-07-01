<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor WA</th>
                <th>Cabang</th>
                <th>Catatan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->full_name}}</td>
                    <td>{{$admin->wa_number}}</td>
                    <td>{{$admin->cabang->name}}</td>
                    <td>{{$admin->note == null ? '-' : $admin->note}}</td>
                    <td>
                        <a href="{{asset('storage/profile') . '/'. $admin->img_name}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/profile') . '/'. $admin->img_name}}" alt="Foto" width="80px">
                        </a>
                    </td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$admin->id}})"/>
                        <x-adminlte-button class="btn-sm" theme="danger" icon="fas fa-trash-alt"
                        wire:click="delete({{$admin->id}}, '{{$admin->full_name}}')"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

