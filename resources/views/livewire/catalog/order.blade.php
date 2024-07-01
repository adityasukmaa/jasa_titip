<div class="col-lg-4" id="sidebar_fixed">
    <div>
        <script>
            window.onload = function(){
                // close order modal
                function success(pos) {
                    const crd = pos.coords;
                    if(crd == null){
                        alert('Gagal mendapatkan lokasi!');
                        window.location.href = '/';
                    }
                    @if (!$toko->is_open)
                        alert('Oops! Toko sedang tutup, kembali lain waktu!')
                    @endif

                    Livewire.emit('setLoc', crd.latitude,crd.longitude )
                }
                function error(err) {
                    alert('Izinkan Akses Lokasi. Kami Memerlukan Akses Lokasi Kamu.')
                    window.location.href = '/';
                    console.warn(`ERROR(${err.code}): ${err.message}`);
                }
                if (navigator.geolocation) {
                    let coords = navigator.geolocation.getCurrentPosition(success, error);
                    console.log(coords)
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
                if(window.innerWidth >= 990){
                    let box_order = document.getElementsByClassName('box_order')[0];
                    console.log(box_order.style.display)
                    box_order.style.display = 'block';
                }
                
            }
        </script>
        <div class="box_order mobile_fixed" @if($show) style="display: block" @endif>
            <div class="head">
                <h3>Pesanan Anda</h3>
                <a href="#0" class="close_panel_mobile"><i class="icon_close"></i></a>
            </div>
            <!-- /head -->
            <div class="main">
                <ul >
                    @php
                        $pesanan = [];
                        $total = 0;
                        if($orders != null){
                            foreach ($orders as $id => $qty) {
                                $item = App\Models\Product::find($id);
                                $total += $item->price * $qty;
                                array_push($pesanan, ['item' => $item, 'qty' => $qty]);
                            }
                        }
                    @endphp
                    @foreach ($pesanan as $p)
                        <li class="x-order_item">
                            <span  href="">{{$p['qty']}}X {{$p['item']->name}} = {{number_format($p['item']->price * $p['qty'], 0, ',', '.') }}</span>
                            <span style="color: red" wire:click="del({{$p['item']->id}})">Hapus</span>
                        </li>
                    @endforeach
                </ul>
                <ul class="clearfix">
                    <li class="total">Total<span>{{number_format($total, 0, ',', '.') }}</span></li>
                </ul>
               
                <div class="btn_1_mobile">
                    <a href="#" class="btn_1 gradient full-width mb_5" wire:click="next">Lanjut</a>
                    {{-- <div class="text-center"><small>Setelah in</small></div> --}}
                </div>
                </div>
            </div>
            
        </div>
        <!-- /box_order -->
        @if ($toko->is_open)
            <div class="btn_reserve_fixed"><a href="#0" class="btn_1 gradient full-width">Lihat Order</a></div>
        @endif
    </div>
    
</div>