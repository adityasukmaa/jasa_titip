<div class="modal show" style="padding-right: 15px; display: {{ $show }}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">
                    <i class="fas fa-pencil-alt mr-2"></i> Update Data Admin
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <x-adminlte-input name="full_name" label="Nama" placeholder="Nama Lengkap Admin"  wire:model="full_name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="username" label="Username" placeholder="Nama Pengguna Untuk Login"  wire:model="username">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="wa_number" label="Nomor WA" placeholder="Format 628XXXX"  wire:model="wa_number">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone-square-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input-file name="file" label="Upload Foto" igroup-size="sm" placeholder="Pilih Foto..."  wire:model="file">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/profile') . '/' . $img_name}}" alt="Foto Profil" height="100px">
        
                <x-adminlte-input name="note" label="Catatan" placeholder="Catatan"  wire:model="note">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-quote-right"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-select name="cabang_id" label="Cabang"  igroup-size="md" wire:model="cabang_id">
                    <x-slot name="prependSlot">
                        <div class="input-group-text ">
                            <i class="fas fa-route"></i>
                        </div>
                    </x-slot>
                        <option value="">Pilih Cabang</option>
                        @foreach ($cabangs as $cabang)
                            <option value="{{$cabang->id}}">{{$cabang->name}}</option>
                        @endforeach
                </x-adminlte-select>

            </div>
            <div class="modal-footer">
                <x-adminlte-button label="Batal" theme="primary" wire:click="$set('show', 'hidden')" />
            
                <button type="button" class="btn btn-default bg-warning" data-dismiss="modal"
                    wire:click="update({{$admin_id}})">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
