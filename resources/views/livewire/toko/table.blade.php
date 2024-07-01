<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Nama Toko</th>
                <th>Slug</th>
                <th>Nomor WA</th>
                <th>Cabang</th>
                <th>Deskripsi</th>
                <th>Alamat/Lokasi</th>
                <th>Foto Cover</th>
                <th>Foto Profile</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tokos as $toko)
                <tr>
                    <td>{{$toko->name}}</td>
                    <td>{{$toko->slug}}</td>
                    <td>{{$toko->wa_number}}</td>
                    <td>{{$toko->cabang->name}}</td>
                    <td>{{$toko->description}}</td>
                    <td>
                        <a target="_blank" href="{{"https://www.google.com/maps/search/?api=1&query=" . $toko->lat . ',' . $toko->long}}">
                            {{$toko->address}}
                        </a>
                    </td>
                    <td>
                        <a href="{{asset('storage/toko') . '/'. $toko->cover_img}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/toko') . '/'. $toko->cover_img}}" alt="Foto Cover" width="80px">
                        </a>
                    </td>
                    <td>
                        <a href="{{asset('storage/toko') . '/'. $toko->profile_img}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/toko') . '/'. $toko->profile_img}}" alt="Foto Profile" width="80px">
                        </a>
                    </td>
                    <td>
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$toko->id}})"/>
                        <x-adminlte-button class="btn-sm" theme="danger" icon="fas fa-trash-alt"
                        wire:click="delete({{$toko->id}}, '{{$toko->name}}')"/>
                        <a href="{{route('admin.product', ['toko' => $toko->id])}}">
                            <x-adminlte-button class="btn-sm" theme="info" icon="fas fa-boxes"/>
                        </a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

