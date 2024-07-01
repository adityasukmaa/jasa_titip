<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Tambah Produk" theme="success" icon="fas fa-plus-square">
        <x-adminlte-input name="name" label="Nama Produk" placeholder="Nama Produk" label-class="text-success" wire:model="name">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-boxes text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="description" label="Deskripsi Produk" placeholder="Deskripsi Produk" label-class="text-success" wire:model="description">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-quote-right text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input type="number" name="price" label="Harga Produk" placeholder="Harga Produk" label-class="text-success" wire:model="price">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-money-bill text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input-file name="file_product" label="Foto Produk" igroup-size="sm" placeholder="Upload Foto Produk" label-class="text-success" wire:model="file_product">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

        <x-slot name="footerSlot">
            <x-adminlte-button class="d-flex ml-auto px-3 py-2" theme="success" label="Tambah" type='submit' />
        </x-slot>
    </x-adminlte-card>
</form>
