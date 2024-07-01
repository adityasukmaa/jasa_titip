<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Tambah Data Kurir" theme="success" icon="fas fa-plus-square">
        <x-adminlte-input name="full_name" label="Nama Lengkap Kurir" placeholder="Nama Lengkap Kurir" label-class="text-success" wire:model="full_name">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="address_ktp" label="Alamat KTP" placeholder="Alamat Sesuai dengan KTP" label-class="text-success" wire:model="address_ktp">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-address-card text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="address_now" label="Alamat Tinggal" placeholder="Alamat Tinggal" label-class="text-success" wire:model="address_now">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-map-marker-alt text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input-file name="file_ktp" label="Foto KTP" igroup-size="sm" placeholder="Upload Foto KTP" label-class="text-success" wire:model="file_ktp">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

        <x-adminlte-input-file name="file_profile" label="Foto Wajah" igroup-size="sm" placeholder="Upload Foto Wajah" label-class="text-success" wire:model="file_profile">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

        <x-adminlte-input name="wa_number" label="Nomor Wa" placeholder="Format 628XXX" label-class="text-success" wire:model="wa_number">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-map-marker-alt text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="password" label="Password" placeholder="Password" label-class="text-success" wire:model="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-key text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

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
