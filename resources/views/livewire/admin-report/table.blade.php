<div>
    <div class="col-md-6">
        @php  $config = ["locale" => ["format" => "DD-MM-YYYY"]]; @endphp
        <x-adminlte-date-range name="date_range_input" :config="$config" enable-default-ranges="Today" label="Range Tanggal">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-success">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </x-slot>
        </x-adminlte-date-range>
        <input type="hidden" id="report_date_range" name="date_range" wire:model="date_range">

        @push('js')
            <script>
                $('input[name="date_range_input"]').on('apply.daterangepicker', function(ev, picker) {
                    let dateVal = picker.startDate.format('YYYY-MM-DD') + '|' + picker.endDate.format('YYYY-MM-DD');
                    Livewire.emit('dateChange', dateVal);
                });
            </script>
        @endpush       
    </div>
    <div class="table-responsive">
    <table class="table table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Cabang</th>
                <th>Order</th>
                <th>Transaksi</th>
                <th>Jasa Kurir</th>
                <th>Jasa Layanan</th>
            </tr>
        </thead>
        <tbody>
            @if (auth()->user()->role == 'admin')
                 <tr>
                    <td>{{$cabangs->name}}</td>
                    <td>{{$cabangs->orders->count()}}</td>
                    <td>Rp. {{number_format($cabangs->orders->sum('price'), 0, ',', '.')}}</td>
                    <td>Rp. {{number_format($cabangs->orders->sum('courir_fee'), 0, ',', '.')}}</td>
                    <td>Rp. {{number_format($cabangs->orders->sum('app_fee'), 0, ',', '.')}}</td>
                </tr>
            @else
            @foreach ($cabangs as $cb)
                <tr>
                    <td>{{$cb->name}}</td>
                    <td>{{$cb->orders->count()}}</td>
                    <td>Rp. {{number_format($cb->orders->sum('price'), 0, ',', '.')}}</td>
                    <td>Rp. {{number_format($cb->orders->sum('courir_fee'), 0, ',', '.')}}</td>
                    <td>Rp. {{number_format($cb->orders->sum('app_fee'), 0, ',', '.')}}</td>
                </tr>
            @endforeach
            @endif
            
        </tbody>
    </table>
</div>

</div>

