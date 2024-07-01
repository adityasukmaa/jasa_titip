<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $st)
                <tr>
                    <td>{{$st->key}}</td>
                    <td>{{$st->value}}</td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$st->id}})"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

