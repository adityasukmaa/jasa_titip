<div class="modal show" style="padding-right: 15px; display: {{ $show }}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">
                    <i class="fas fa-pencil-alt mr-2"></i> Update Data Produk
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <x-adminlte-input name="name" label="Nama Produk" placeholder="Nama Produk"  wire:model="name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input name="description" label="Deskripsi Produk" placeholder="Deskripsi Produk"  wire:model="description">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-quote-right"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="number" name="price" label="Harga Produk" placeholder="Harga Produk"  wire:model="price">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input-file name="file_product" label="Foto Produk" igroup-size="sm" placeholder="Upload Foto Produk"  wire:model="file_product">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/product') . '/' . $product_img}}" alt="Foto Produk" height="100px">
        

            </div>
            <div class="modal-footer">
                <x-adminlte-button label="Batal" theme="primary" wire:click="$set('show', 'hidden')" />
            
                <button type="button" class="btn btn-default bg-warning" data-dismiss="modal"
                    wire:click="update({{$product_id}})">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
