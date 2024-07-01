<div>
    <div class="table-responsive">
    <table class="table table-bordered" style="min-width: 100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->created_at)->format('d/m/Y H:i')}}</td>
                    <td>{{number_format( $history->topup , 0, ',', '.')}}</td>
                    <td>Rp. {{number_format( $history->price , 0, ',', '.')}}</td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

