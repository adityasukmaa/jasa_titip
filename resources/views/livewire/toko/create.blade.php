<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Tambah Data Toko" theme="success" icon="fas fa-plus-square">
        <x-adminlte-input name="name" label="Nama Toko" placeholder="Nama Toko" label-class="text-success" wire:model="name">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-store text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="description" label="Deskripsi Toko" placeholder="Deskripsi Toko" label-class="text-success" wire:model="description">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-quote-right text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="wa_number" label="Nomor Wa" placeholder="Format 628XXX" label-class="text-success" wire:model="wa_number">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fab fa-whatsapp text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="password" label="Password" placeholder="Isikan Password" label-class="text-success" wire:model="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-key text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="address" label="Alamat Toko" placeholder="Alamat Toko" label-class="text-success" wire:model="address">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-map-marker-alt text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input-file name="file_cover" label="Foto Cover" igroup-size="sm" placeholder="Upload Foto Cover" label-class="text-success" wire:model="file_cover">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

        <x-adminlte-input-file name="file_profile" label="Foto Profile Toko" igroup-size="sm" placeholder="Upload Foto Profile Toko" label-class="text-success" wire:model="file_profile">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

        @can('superadmin', auth()->user())
        {{-- show only to superadmin --}}
        <x-adminlte-select name="cabang_id" label="Cabang" label-class="text-success" igroup-size="md" wire:model="cabang_id">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-success">
                    <i class="fas fa-route"></i>
                </div>
            </x-slot>
                <option value="">Pilih Cabang</option>
                @foreach ($cabangs as $cabang)
                    <option value="{{$cabang->id}}">{{$cabang->name}}</option>
                @endforeach
        </x-adminlte-select>
        @endcan
        

        <x-slot name="footerSlot">
            <x-adminlte-button class="d-flex ml-auto px-3 py-2" theme="success" label="Tambah" type='submit' />
        </x-slot>
    </x-adminlte-card>
</form>
