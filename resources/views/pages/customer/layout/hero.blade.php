<div class="hero_single version_1 hero_custome" >
    <div class="opacity-mask">
        <div class="container container_custome">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <h1 style="font-size: 1.3rem">Duduk Manis! Makanan Sampai Ke Lokasimu</h1>
                    <p style="font-size: 1rem; margin-bottom: -8px">Ongkir yang ga mahal dan ramah dikantong kamu!</p>
                    <form method="get" action="{{route('front.searchRes')}}">
                        <div class="row g-0 custom-search-input">
                            <div class="col-lg-10">
                                <input name='cari' class="form-control no_border_r" type="text" id="autocomplete" placeholder="Makanan kesukaan kamu">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn_1 gradient" type="submit">Cari</button>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="search_trends">
                            <h5>Trending:</h5>
                            <ul>
                                <li><a href="{{route('front.searchRes', ['cari' => 'seblak'])}}">Seblak</a></li>
                                <li><a href="{{route('front.searchRes', ['cari' => 'basreng'])}}">Basreng</a></li>
                                <li><a href="{{route('front.searchRes', ['cari' => 'bakso'])}}">Bakso</a></li>
                                <li><a href="{{route('front.searchRes', ['cari' => 'kebab'])}}">Kebab</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <div class="wave hero"></div>
</div>