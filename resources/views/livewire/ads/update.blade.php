<div class="modal show" style="padding-right: 15px; display: {{ $show }}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">
                    <i class="fas fa-pencil-alt mr-2"></i> Update Data Iklan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <x-adminlte-input name="name" label="Nama Iklan" placeholder="Nama Iklan"  wire:model="name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
               
                <x-adminlte-input name="link" label="Link Iklan" placeholder="https://ptsobatkurir.com/toko/nama_toko"  wire:model="link">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-sticky-note"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input-file name="file_banner" label="Foto KTP" igroup-size="sm" placeholder="Upload Banner"  wire:model="file_banner">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <img src="{{asset('storage/iklan') . '/' . $banner_img}}" alt="Foto Iklan" height="100px">
                
                <x-adminlte-select name="is_active" label="Status Iklan"  igroup-size="md" wire:model="is_active">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-eye"></i>
                        </div>
                    </x-slot>
                        @foreach ($statuses as $status)
                            <option value="{{$status['value']}}">{{$status['label']}}</option>
                        @endforeach
                </x-adminlte-select>

            </div>
            <div class="modal-footer">
                <x-adminlte-button label="Batal" theme="primary" wire:click="$set('show', 'hidden')" />
            
                <button type="button" class="btn btn-default bg-warning" data-dismiss="modal"
                    wire:click="update({{$ads_id}})">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
