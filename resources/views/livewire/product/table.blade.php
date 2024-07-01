<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Foto Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        Rp. 
                        {{  number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{asset('storage/product') . '/'. $product->product_img}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/product') . '/'. $product->product_img}}" alt="Foto Produk" width="80px">
                        </a>
                    </td>
                    <td  style="min-width: 220px">
                        <x-adminlte-button class="btn-sm" theme="warning" icon="fas fa-pencil-alt"
                        wire:click="edit({{$product->id}})"/>
                        @if ($product->is_available)
                            <x-adminlte-button class="btn-sm" theme="info" icon="fas fa-power-off" label="Non Aktifkan" wire:click="toggleStatus({{$product->id}})"/>
                        @else
                            <x-adminlte-button class="btn-sm" theme="success" icon="fas fa-power-off" label="Aktifkan" wire:click="toggleStatus({{$product->id}})"/>
                        @endif
                        <x-adminlte-button class="btn-sm" theme="danger" icon="fas fa-trash-alt"
                        wire:click="delete({{$product->id}}, '{{$product->name}}')"/>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

