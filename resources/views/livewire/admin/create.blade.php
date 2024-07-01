<form method="post" wire:submit.prevent="store">
    <x-adminlte-card title="Tambah Data Admin" theme="success" icon="fas fa-plus-square">
        
        <x-adminlte-input name="full_name" label="Nama" placeholder="Nama Lengkap Admin" label-class="text-success" wire:model="full_name">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="username" label="Username" placeholder="Nama Pengguna Untuk Login" label-class="text-success" wire:model="username">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="wa_number" label="Nomor WA" placeholder="Format 628XXXX" label-class="text-success" wire:model="wa_number">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-phone-square-alt text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="password" label="Password" placeholder="Password Sementara" label-class="text-success" wire:model="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-key text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- <x-adminlte-input-file name="file" label="Upload Foto" placeholder="Pilih Foto..." label-class="text-success" disable-feedback wire:model="file"/> --}}

        <x-adminlte-input-file name="file" label="Upload Foto" igroup-size="sm" placeholder="Pilih Foto..." label-class="text-success" wire:model="file">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

        <x-adminlte-input name="note" label="Catatan" placeholder="Catatan" label-class="text-success" wire:model="note">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-quote-right text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

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

        <x-slot name="footerSlot">
            <x-adminlte-button class="d-flex ml-auto px-3 py-2" theme="success" label="Tambah" type='submit' />
        </x-slot>
    </x-adminlte-card>
</form>
