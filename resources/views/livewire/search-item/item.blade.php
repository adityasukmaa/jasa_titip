
<div class="row">
    @foreach ($products as $product)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" wire:click="itemClick({{$product->id}}, '{{$product->toko->slug}}')">
        <div class="strip" >
            <figure >
                <img src={{asset('storage/product/' . $product->product_img)}} data-src={{asset('storage/product/' . $product->product_img)}} class="img-fluid lazy" alt="">
                <a class="strip_info">
                    <small>Rp. {{number_format($product->price, 0, ',', '.')}}</small>
                    <div class="item_title">
                        <h3>{{$product->name}}</h3>
                        <small>{{$product->toko->name}}</small><br>
                        <small>{{$product->toko->cabang->name}}</small>
                    </div>
                </a>
            </figure>
            {{-- <ul>
                <li><span class="deliv yes">Delivery</span></li>
            </ul> --}}
        </div>
    </div>
@endforeach
</div>