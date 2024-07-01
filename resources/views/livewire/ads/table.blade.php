<div>
    
    <div class="table-responsive">
    <table class="table table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Link</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <td>{{$ad->name}}</td>
                    <td>
                        @if ($ad->is_active)
                            <span class="btn btn-block btn-outline-success btn-xs">AKTIF</span>
                        @else
                            <span class="btn btn-block btn-outline-danger btn-xs">NON-AKTIF</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{$ad->link}}" target="_blank">{{$ad->link}}</a>
                    </td>
                    <td>
                        <a href="{{asset('storage/iklan') . '/'. $ad->banner_img}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/iklan') . '/'. $ad->banner_img}}" alt="Foto Iklan" width="80px">
                        </a>
                    </td>
                    
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$ad->id}})"/>
                        <x-adminlte-button class="btn-sm" theme="danger" icon="fas fa-trash-alt"
                        wire:click="delete({{$ad->id}}, '{{$ad->name}}')"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

