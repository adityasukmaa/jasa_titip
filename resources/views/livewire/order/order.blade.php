<div class="container margin_60_20">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <div class="box_order_form">
                <div class="head">
                    <div class="title">
                        <h3>Personal Details</h3>
                    </div>
                </div>
                <!-- /head -->
                <div class="main">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" placeholder="Nama Lengkap Kamu" required wire:model="customer_name">
                                @error('customer_name')
                                    <span style="color: red; font-style:italic">*{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor WA</label>
                                <input type="number" class="form-control" placeholder="Format 628XXX" required wire:model="customer_wa">
                                @error('customer_wa')
                                    <span style="color: red; font-style:italic">*{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Alamat Detail</label>
                        <input class="form-control" placeholder="Catatan Untuk Kurir Kamu Agar Tidak Kesasar" required wire:model="customer_address">
                        @error('customer_address')
                            <span style="color: red; font-style:italic">*{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <script>
                    window.onload = function(){
                        function success(pos) {
                            const crd = pos.coords;
                            Livewire.emit('setLoc', crd.latitude,crd.longitude )
                        }
                        function error(err) {
                            console.warn(`ERROR(${err.code}): ${err.message}`);
                        }
                        if (navigator.geolocation) {
                            let coords = navigator.geolocation.getCurrentPosition(success, error);
                            console.log(coords)
                        } else {
                            x.innerHTML = "Geolocation is not supported by this browser.";
                        }
                    }
                    </script>
            </div>
        </div>
        <!-- /col -->
        <div class="col-xl-4 col-lg-4" id="sidebar_fixed">
            <div class="box_order">
                <div class="head">
                    <h3>Order Summary</h3>
                </div>
                <!-- /head -->
                <div class="main">
                    <ul>
                        <li>Tanggal<span>{{date('d-m-Y')}}</span></li>
                        <li>Jam<span>{{date('H:i')}}</span></li>
                    </ul>
                    <hr>
                    <ul class="clearfix">
                       
                        @foreach ($orders as $order)
                            <li>
                                <a href="#0">{{$order['qty']}}X {{$order['item']['name']}} </a>
                                <span>{{number_format($order['item']['price'] * $order['qty'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                    
                    <ul class="clearfix">
                        <li>Harga<span>{{number_format($total, 0, ',', '.') }}</span></li>
                        <li>Jasa Kurir <strong>({{$distance}} KM)</strong><span>{{number_format($courir_fee, 0, ',', '.') }}</span></li>
                        <li>Aplikasi<span>{{number_format($app_fee, 0, ',', '.') }}</span></li>
                        <li class="total">Total<span>{{number_format($grand_total, 0, ',', '.') }}</span></li>
                    </ul>
                    <a href="#" class="btn_1 gradient full-width mb_5" wire:click="store">Order Now</a>
                    {{-- <div class="text-center"><small>Or Call Us at <strong>0432 48432854</strong></small></div> --}}
                </div>
            </div>
            <!-- /box_booking -->
        </div>
    </div>
    <!-- /row -->
</div>