<div class="modal show" style="padding-right: 15px; display: {{ $show }}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">
                    <i class="fas fa-pencil-alt mr-2"></i> Update Data Kurir
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <x-adminlte-input name="full_name" label="Nama Lengkap Kurir" placeholder="Nama Lengkap Kurir"  wire:model="full_name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input name="address_ktp" label="Alamat KTP" placeholder="Alamat Sesuai dengan KTP"  wire:model="address_ktp">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="address_now" label="Alamat Tinggal" placeholder="Alamat Tinggal"  wire:model="address_now">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input-file name="file_ktp" label="Foto KTP" igroup-size="sm" placeholder="Upload Foto KTP"  wire:model="file_ktp">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/kurir') . '/' . $ktp_img}}" alt="Foto KTP" height="100px">
        

                <x-adminlte-input-file name="file_profile" label="Foto Wajah" igroup-size="sm" placeholder="Upload Foto Wajah"  wire:model="file_profile">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/kurir') . '/' . $profile_img}}" alt="Foto Profile" height="100px">
                

                <x-adminlte-input name="wa_number" label="Nomor Wa" placeholder="Format 628XXX"  wire:model="wa_number">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input name="password" label="Password" placeholder="Password"  wire:model="password">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-key "></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                @can('superadmin', auth()->user())
                <x-adminlte-select name="cabang_id" label="Cabang"  igroup-size="md" wire:model="cabang_id">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-route"></i>
                        </div>
                    </x-slot>
                        <option value="">Pilih Cabang</option>
                        @foreach ($cabangs as $cabang)
                            <option value="{{$cabang->id}}">{{$cabang->name}}</option>
                        @endforeach
                </x-adminlte-select>
                @endcan

            </div>
            <div class="modal-footer">
                <x-adminlte-button label="Batal" theme="primary" wire:click="$set('show', 'hidden')" />
            
                <button type="button" class="btn btn-default bg-warning" data-dismiss="modal"
                    wire:click="update({{$kurir_id}})">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
