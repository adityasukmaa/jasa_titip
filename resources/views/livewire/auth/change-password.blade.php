<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Ganti Password" theme="success" icon="fas fa-plus-square">
        
        <x-adminlte-input name="old_password" label="Password Lama" placeholder="Password Lama" label-class="text-success" wire:model="old_password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-key text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="new_password" label="Password Baru" placeholder="Password Baru" label-class="text-success" wire:model="new_password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-key text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="new_password_confirmation" label="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru" label-class="text-success" wire:model="new_password_confirmation">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-key text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-slot name="footerSlot">
            <x-adminlte-button class="d-flex ml-auto px-3 py-2" theme="success" label="Ubah" type='submit' />
        </x-slot>
    </x-adminlte-card>
</form>
