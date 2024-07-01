<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Tambah Data Iklan" theme="success" icon="fas fa-plus-square">
        
        <x-adminlte-input name="name" label="Nama Iklan" placeholder="Nama Iklan" label-class="text-success" wire:model="name">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="link" label="Link Iklan" placeholder="https://ptsobatkurir.com/toko/nama_toko" label-class="text-success" wire:model="link">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-sticky-note text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
       
        <x-adminlte-input-file name="file_banner" label="Foto KTP" igroup-size="sm" placeholder="Upload Banner" label-class="text-success" wire:model="file_banner">
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
