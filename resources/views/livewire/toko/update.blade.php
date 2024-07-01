<div class="modal show" style="padding-right: 15px; display: {{ $show }}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">
                    <i class="fas fa-pencil-alt mr-2"></i> Update Data Toko
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <x-adminlte-input name="name" label="Nama Toko" placeholder="Nama Toko"  wire:model="name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-store"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input name="description" label="Deskripsi Toko" placeholder="Deskripsi Toko"  wire:model="description">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-quote-right"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="wa_number" label="Nomor Wa" placeholder="Format 628XXX"  wire:model="wa_number">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="password" label="Password" placeholder="Isikan Password"  wire:model="password">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="address" label="Alamat Toko" placeholder="Alamat Toko"  wire:model="address">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input name="latlong" label="Latitude Longtitude" placeholder="Lattitude,Longtitude"  wire:model="latlong">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input-file name="file_cover" label="Foto Cover" igroup-size="sm" placeholder="Upload Foto Cover"  wire:model="file_cover">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/toko') . '/' . $cover_img}}" alt="Foto Cover" height="100px">
        
                <x-adminlte-input-file name="file_profile" label="Foto Profile Toko" igroup-size="sm" placeholder="Upload Foto Profile Toko"  wire:model="file_profile">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/toko') . '/' . $profile_img}}" alt="Foto Profile Toko" height="100px">


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
                    wire:click="update({{$toko_id}})">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
