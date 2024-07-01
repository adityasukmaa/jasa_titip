<div class="container " style="margin-bottom: 10px">
    <div class="main_title center">
        <span><em></em></span>
        <h2 style="margin-top: 10px">Layanan</h2>
        <p style="margin-bottom:10px">Banyak Layanan Untuk Semua Kebutuhan Kamu!</p>
    </div>
    <div class="service-container">
        <a href="/">
            <img src="{{asset('storage/services/food.png')}}" alt="">
            <span class="service-text">Sobat Kuliner</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/ojek.png')}}" alt="">
            <span class="service-text">Sobat Ojek</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/paket.png')}}" alt="">
            <span class="service-text">Sobat Paket</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/pasar.png')}}" alt="">
            <span class="service-text">Sobat Pasar</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/print.png')}}" alt="">
            <span class="service-text">Sobat Printing</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/topup.png')}}" alt="">
            <span class="service-text">Sobat TopUp</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/travel.png')}}" alt="">
            <span class="service-text">Sobat Travel</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/warung.png')}}" alt="">
            <span class="service-text">Sobat Warung</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/bengkel.png')}}" alt="">
            <span class="service-text">Sobat Bengkel</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/laundry.png')}}" alt="">
            <span class="service-text">Sobat Laundry</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/cuci-karpet.png')}}" alt="">
            <span class="service-text">Sobat Cucian</span>
        </a>
        <a href="#" class="unavailable-services">
            <span class="badge">Akan Datang</span>
            <img src="{{asset('storage/services/lainnya.png')}}" alt="">
            <span class="service-text">Lainnya</span>
        </a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let items = document.getElementsByClassName('unavailable-services');
            for (var i = 0; i < items.length; i++) {
                items[i].addEventListener('click', function() {
                    alert('Layanan Belum Tersedia Untuk Saat Ini!');
                });
            }
        });
    </script>
</div>