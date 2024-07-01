<div class="bg_gray">
    <div class="container margin_60_40" style="padding-top: 20px">
        <div class="main_title">
            <span><em></em></span>
            <h2>Lokasi</h2>
            <p>Lihat Berdasarkan Lokasi</p>
        </div>
        <div class="row add_bottom_25">
            <div class="col-lg-12">
                <div class="list_home">
                    <ul>
                        @foreach ($cabang as $cb)
                        <li>
                            <a href="{{route('front.cabangRes', ['id' => $cb->id])}}" >
                                <figure>
                                    <img src={{asset('storage/cabang') . '/' . rand(1,7) .'.jpg'}}  alt="" class="lazy" width="350" height="233">
                                </figure>
                                <em>Cabang</em>
                                <h3>{{$cb->name}}</h3>
                            </a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
            
        </div>
       
        <!-- /banner -->
    </div>
</div>