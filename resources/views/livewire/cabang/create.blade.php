<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Tambah Data Cabang" theme="success" icon="fas fa-plus-square">
        <x-adminlte-input name="name" label="Nama Cabang" placeholder="Nama Cabang" label-class="text-success" wire:model="name">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-route text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Deskripsi atau Keterangan" label-class="text-success" wire:model="keterangan">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-quote-right text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-slot name="footerSlot">
            <x-adminlte-button class="d-flex ml-auto px-3 py-2" theme="success" label="Tambah" type='submit' />
        </x-slot>
    </x-adminlte-card>
</form>
