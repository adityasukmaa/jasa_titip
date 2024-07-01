<div class="table_wrapper">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-6 {{$product->is_available && $toko->is_open ? '' : 'item-unavailable'}}" @if($product->is_available && $toko->is_open) wire:click="openModal({{ $product->id }}, '{{ $product->name }}')"@endif >
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure>
                        <img src={{asset('storage/product/' . $product->product_img)}} data-src={{asset('storage/product/' . $product->product_img)}} alt="thumb" class="lazy">
                    </figure>
                    <h3>{{$product->name}}</h3>
                    <p>{{$product->description}}</p>
                    <strong>Rp. {{number_format($product->price, 0, ',', '.')}}</strong>
                </a>
            </div>
        @endforeach
    </div>
</div>