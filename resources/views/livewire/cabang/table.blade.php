<div>
    
    <div class="table-responsive">
    <table class="table table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cabangs as $cabang)
                <tr>
                    <td>{{$cabang->name}}</td>
                    <td>{{$cabang->keterangan}}</td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$cabang->id}})"/>
                        <x-adminlte-button class="btn-sm" theme="danger" icon="fas fa-trash-alt"
                        wire:click="delete({{$cabang->id}}, '{{$cabang->name}}')"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

