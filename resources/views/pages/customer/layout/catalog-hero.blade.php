<div class="hero_in detail_page background-image" data-background="url({{asset('storage/toko/' . $toko->cover_img)}})">
    <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container">
            <div class="main_info">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <h1>{{$toko->name}}</h1>
                        {{$toko->description}}
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-6 position-relative">
                        <div class="buttons clearfix">
                            <span class="magnific-gallery">
                                <a href={{asset('storage/toko/' . $toko->cover_img)}} class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>Lihat Foto</a>
                                @foreach ($toko->products as $product)
                                    <a href={{asset('storage/product/' . $product->product_img)}} title="Photo title" data-effect="mfp-zoom-in"></a>
                                @endforeach
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /main_info -->
        </div>
    </div>
</div>