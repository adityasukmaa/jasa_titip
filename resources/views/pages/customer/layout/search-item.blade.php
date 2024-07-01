<div class="bg_gray">
    <div class="container margin_60_40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12"><h2 class="title_small">Daftar Makanan</h2></div>
                @if(count($products) > 0)
                    @livewire('search-item.item', ['products' => $products])
                @else
                    <p>Pencarian untuk <strong>"{{request()->cari}}"</strong> tidak ditemukan</p>
                @endif
            </div>
    
        </div>
    </div>
</div>
