<div wire:poll.10000ms="ring">
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>WA</th>
                <th>Address</th>
                <th>GMap</th>
                <th>Harga</th>
                <th>FEE Aplikasi</th>
                <th>FEE Kurir</th>
                <th>Orders</th>
                <th>Status</th>
                <th>Kirim Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->customer_wa}}</td>
                    <td>{{$order->customer_address}}</td>
                    <td>
                        <a target="_blank" href="{{"https://www.google.com/maps/search/?api=1&query=" . $order->lat . ',' . $order->long}}">Open In GMAP</a>
                    </td>
                    <td>{{number_format($order->price, 0, ',', '.') }}</td>
                    <td>{{number_format($order->app_fee, 0, ',', '.') }}</td>
                    <td>{{number_format($order->courir_fee, 0, ',', '.') }}</td>
                    <td>
                        <ul>
                            @foreach ($order->items as $item)
                                <li>{{$item->qty}}X {{$item->product->name}} - {{$item->price}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @if ($order->status == 'created')
                            <span class="btn btn-block btn-outline-success btn-xs">BARU</span>
                        @else
                            <span class="btn btn-block btn-outline-info btn-xs">ON-PROCCESS</span>
                        @endif
                    </td>
                    {{-- <td>
                        <x-adminlte-select name="kurir_id" wire:model="kurir_id">
                            <option>Kurir</option>
                            @foreach ($kurirs as $kurir)
                                <option value="{{$kurir->id}}">{{$kurir->full_name}}</option>
                            @endforeach
                        </x-adminlte-select>
                    </td> --}}
                    <td>
                        @if ($order->status == 'created')
                            <x-adminlte-button label="Prosess" class="btn-sm" theme="info" icon=" fas fa-arrow-alt-circle-right"
                            wire:click="proccess('{{$order->id}}')"/>
                        @elseif ($order->status == 'processed')
                            <a 
                            href={{"https://wa.me/" . $order->kurir->wa_number ."?text=" . rawurlencode("*Order Selesai!*\nSisa Saldo:  Rp." .  number_format($order->kurir->saldo - $order->app_fee, 0, ',', '.') . "\n Informasi lebih lanjut, klik link berikut: " . url('/cek-saldo') )}} target="_blank">
                                <x-adminlte-button label="Selesai" class="btn-sm" theme="success" icon="fas fa-check"
                                wire:click="done('{{$order->id}}')"/>
                            </a>
                        @else
                            <x-adminlte-button disabled label="Prosess" class="btn-sm" theme="info" icon="fas fa-arrow-alt-circle-right" wire:click="proccess('{{$order->id}}')"/>
                        @endif
                        <x-adminlte-button  label="Hapus" class="btn-sm" theme="danger" icon="fas fa-trash-alt" wire:click="delete('{{$order->id}}')"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

